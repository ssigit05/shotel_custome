<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;
use App\Models\FasilitasKamar;
use App\Helper\ImageUrl;

class KamarController extends Controller
{
    function __construct()
    {
        $this->middleware('can:role,"admin"',[
            'except'=>['index','show']
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $data = Kamar::select('id','nama_kamar','jum_kamar','harga_kamar')
            ->when($search, function($query, $search){
                return $query->where('nama_kamar','like',"%{$search}%")
                                ->orWhere('harga_kamar','like',"%{$search}%");
           })
            ->paginate(25);

        return view('kamar.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kamar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kamar'=>'required|min:3',
            'foto_kamar'=>'required|image|mimes:png,jpg,jpeg|dimensions:min_width=1000,min_height=500|between:50,5000',
            'jumlah_kamar'=>'required|numeric|gt:0',
            'harga_kamar'=>'required|numeric|gt:0',
            'deskripsi_kamar'=>'required|min:10'
        ]);

        $ext = $request->foto_kamar->getClientOriginalExtension();
        $filename = rand(9,999).'_'.time().'.'.$ext;
        $request->foto_kamar->move('images/kamar/',$filename);

        Kamar::create([
            'nama_kamar'=>$request->nama_kamar,
            'foto_kamar'=>$filename,
            'jum_kamar'=>$request->jumlah_kamar,
            'harga_kamar'=>$request->harga_kamar,
            'deskripsi_kamar'=>$request->deskripsi_kamar
        ]);

        return redirect()->route('kamar.create')->with('status','store');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Kamar $kamar)
    {
        $fasilita = FasilitasKamar::where('kamar_id',$kamar->id)->get();

        $kamar->foto_kamar = ImageUrl::get('images/kamar/',$kamar->foto_kamar);

        return view('kamar.show',['item'=>$kamar,'fasilitas'=>$fasilita]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kamar $kamar)
    {
        return view('kamar.edit',['item'=>$kamar]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kamar $kamar)
    {
        $request->validate([
            'nama_kamar'=>'required|min:3',
            'foto_kamar'=>'nullable|image|mimes:png,jpg,jpeg|dimensions:min_width=1000,min_height=500|between:50,5000',
            'jumlah_kamar'=>'required|numeric|gt:0',
            'harga_kamar'=>'required|numeric|gt:0',
            'deskripsi_kamar'=>'required|min:10'
        ]);

        if ( $kamar->foto_kamar && $request->foto_kamar) {
            $file = 'images/kamar/'.$kamar->foto_kamar;
            if ( file_exists($file)) {
                unlink($file);
            }
        }

        if ( $request->foto_kamar){
            $ext = $request->foto_kamar->getClientOriginalExtension();
            $filename = rand(9,999).'_'.time().'.'.$ext;
            $request->foto_kamar->move('images/kamar/',$filename);

            $arr= [
                'nama_kamar'=>$request->nama_kamar,
                'foto_kamar'=>$filename,
                'jum_kamar'=>$request->jumlah_kamar,
                'harga_kamar'=>$request->harga_kamar,
                'deskripsi_kamar'=>$request->deskripsi_kamar
            ];
        } else{
            $arr =[
                'nama_kamar'=>$request->nama_kamar,
                'jum_kamar'=>$request->jumlah_kamar,
                'harga_kamar'=>$request->harga_kamar,
                'deskripsi_kamar'=>$request->deskripsi_kamar
            ];
        }
        $kamar->update($arr);

        return redirect()->route('kamar.index')->with('status','update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kamar $kamar)
    {
        if ( $kamar->foto_kamar) {
            $file = 'images/kamar/'.$kamar->foto_kamar;
            if ( file_exists($file)) {
                unlink($file);
            }
        }
        $kamar->delete();
        return redirect()->route('kamar.index')->with('status','destroy');
    }
}
