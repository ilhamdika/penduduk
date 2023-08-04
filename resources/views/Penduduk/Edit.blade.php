@extends('Layout.Layout')
<!-- START FORM -->

@section('konten')

<div class="row pb-3">
    <div class="col-md-6 justify-content-end">
        <a href='{{ url('provinsi') }}' class="btn btn-primary">Data Provinsi</a>
        <a href='{{ url('kabupaten') }}' class="btn btn-primary">Data Kabupaten</a>
    </div>
</div>

<form action='{{ url('penduduk/'. $dataPenduduk->id) }}' method='post'>
@csrf
@method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{ url('/') }}' class="btn btn-secondary">kembali</a>
        
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama' value="{{$dataPenduduk->nama}}" id="nama">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="nik" class="col-sm-2 col-form-label">NIK</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nik' value="{{$dataPenduduk->nik}}" id="nik">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="alamat" class="col-sm-2 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-10">
                <input type="radio" id="laki-laki" name="jenis_kelamin" value="Laki-laki">
                <label for="laki-laki">Laki-laki</label><br>
                <input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan">
                <label for="perempuan">Perempuan</label><br>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-10">
             <input type="date" id="datepicker" name="tanggal_lahir" value="{{$dataPenduduk->tanggal_lahir}}">
            </div>
        </div>

        
        <div class="mb-3 row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <textarea name="alamat" id="alamat" cols="30" rows="10">{{$dataPenduduk->alamat}}</textarea>
            </div>
        </div>
        
        <div class="mb-3 row">
            <label for="provinsi_id" class="col-sm-2 col-form-label">Provinsi</label>
            <div class="col-sm-10">
                <select name="provinsi_id" id="provinsi_id">
                    @foreach ($provinsi as $item)
                    <option value="{{$dataPenduduk->provinsi_id}}">
                        {{ $item->nama_provinsi }}
                    @endforeach
                    </option>
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="kabupaten_id" class="col-sm-2 col-form-label">Kabupaten</label>
            <div class="col-sm-10">
                <select name="kabupaten_id" id="kabupaten_id">
                    @foreach ($kabupaten as $item)
                    <option value="{{$item->id}}">
                        {{ $item->nama_kabupaten }}
                    @endforeach
                    </option>
                </select>
            </div>

        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    </div>
</form>
<!-- AKHIR FORM -->
@endsection

