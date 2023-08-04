@extends('Layout.Layout')
<!-- START FORM -->

@section('konten')


<form action='{{ url('kabupaten') }}' method='post'>
@csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h1>Tambah Kabupaten</h1>
        <a href='{{ url('kabupaten') }}' class="btn btn-secondary">kembali</a>
        <div class="mb-3 row">
            <label for="nama_kabupaten" class="col-sm-2 col-form-label">Nama Kabupaten</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama_kabupaten' value="{{ Session::get('nama_kabupaten') }}" id="nama_kabupaten">
            </div>
        </div>
        <div class="mb-3 row">
            <select name="provinsi_id" id="provinsi_id">
                @foreach ($provinsi as $item)
                <option value="{{$item->id}}">
                    {{ $item->nama_provinsi }}
                @endforeach
                </option>
            </select>
        </div>
        
        <div class="mb-3 row">
        
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    </div>
</form>
<!-- AKHIR FORM -->
@endsection