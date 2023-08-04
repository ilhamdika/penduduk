@extends('Layout.Layout')
<!-- START FORM -->

@section('konten')


<form action='{{ url('provinsi/'.$dataProvinsi->id) }}' method='post'>
@csrf
@method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h1>Edit Provinsi</h1>
        <a href='{{ url('provinsi') }}' class="btn btn-secondary">kembali</a>
        <div class="mb-3 row">
            <label for="nama_provinsi" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama_provinsi'value="{{ $dataProvinsi->nama_provinsi}}" id="nama_provinsi">
            </div>
        </div>
        
        <div class="mb-3 row">
        
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    </div>
</form>
<!-- AKHIR FORM -->
@endsection