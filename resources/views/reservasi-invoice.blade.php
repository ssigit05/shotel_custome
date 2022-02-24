
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Booking Invoice</title>
    <style>
      body {
        font-family: Arial, Helvetica, sans-serif;
        line-height: 24px;
      }
      table {
        width: 100%;
        border-collapse: collapse;
      }
      table td {
        vertical-align: top;
      }
      .header h1 {
        font-size: xx-large;
      }
      .nota {
        margin-top: 20px;
      }
      .nota th,
      .nota td {
        padding: 10px;
        border-bottom: 1px solid #cccccc;
        text-align: center;
      }
      .nota thead tr {
        background-color: #dddddd;
      }
    </style>
  </head>
  <body>
    <table class="header">
      <tr>
        <td>
          <h1>Booking Invoice</h1>
        </td>
        <td style="text-align: right">
          <img src="{{ public_path('images/ssgit.png')}}" width="100">
          <h2 style="margin:0;">{{ config('app.name')}}</h2>
          <p>
            Jl. Raya Pangandaran, Kabupaten Pangandaran<br />
            Tlp. (0265) 0605 0310
          </p>
        </td>
      </tr>
    </table>
    <!-- ./header -->
    <table>
      <tr>
        <td>
          <h3>Nomor Reg. {{ $item->id}}</h3>
          <p>
            Dibuat Tanggal : {{ date('d/m/Y H:i:s', strtotime($item->created_at) ) }} <br />
            Check IN : {{ $item->tgl_checkin }} <br />
            Check OUT : {{ $item->tgl_checkout }} <br />
            Nama Tamu : <strong> {{$item->nama_tamu}} </strong>
          </p>
        </td>
        <td style="text-align: right">
          <h4>Pemesan</h4>
          Nama : {{ $item->nama_pemesan}} <br />
          Email : {{ $item->email_pemesan}} <br />
          No. HP : {{ $item->no_hp}} <br />
        </td>
      </tr>
    </table>
    <!-- ./Regeister -->

    <table class="nota">
      <thead>
        <tr>
          <th>No.</th>
          <th>Tipe Kamar</th>
          <th>JML</th>
          <th>Harga Satuan</th>
          <th>Total Harga</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>{{ $kamar->nama_kamar}}</td>
          <td>{{ $item->jum_kamar_dipesan}}</td>
          <td>Rp. {{ $kamar->harga_kamar}}</td>
          <td>Rp.  {{ $item->total}}</td>
        </tr>
      </tbody>
    </table>
    <!-- ./Nota -->
    <p>
      <small><i>Terimakasih telah melakukan reservasi dihotel kami.</i></small>
    </p>
  </body>
</html>
