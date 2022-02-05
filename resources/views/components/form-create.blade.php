@props(['action','upload'=>false,'kembali'=>''])
<form action="{{ $action }}" method="post" class="card card-primary small-shadow"<?= $upload ? ' enctype="multipart/form-data"' : ''?>>
    <div class="card-header">
        <i class="fas fa-plus"></i> Tambah
    </div>
    <div class="card-body">
        <?= $slot ?>
    </div>
    <div class="card-footer text-right">
        <a href="{{ $kembali }}" class="btn btn-danger"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
        <button class="btn btn-primary" type="submit">
            <i class="fa fa-save"></i> Simpan
        </button>
    </div>
</form>