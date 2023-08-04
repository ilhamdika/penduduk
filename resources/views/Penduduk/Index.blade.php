@extends('Layout.Layout')
<!-- START DATA -->
@section('konten')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <!-- FORM PENCARIAN -->
    <div class="pb-3">
        <form class="d-flex" action="{{ url('penduduk') }}" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Cari</button>
        </form>
    </div>

    <!-- TOMBOL TAMBAH DATA -->
    <div class="row pb-3">
        <div class="col-md-6">
            <a href='{{ url('penduduk/create') }}' class="btn btn-primary">+ Tambah Data</a>
        </div>
        <form class="d-flex" action="{{ url('penduduk') }}" method="get">
        <div class="col-md-6 justify-content-end">
            <select name="provinsi_id" id="provinsi_id">
                @foreach ($provinsi as $item)
                <option value="{{$item->id}}">
                    {{ $item->nama_provinsi }}
                @endforeach
                </option>
            </select>
           
                    <select name="kabupaten_id" id="kabupaten_id">
                        @foreach ($kabupaten as $item)
                        <option value="{{$item->id}}">
                            {{ $item->nama_kabupaten }}
                        @endforeach
                        </option>
                    </select>
                    <button class="btn btn-secondary" type="submit">Cari</button>
        </div>
        </form>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-md-2">No</th>
                <th class="col-md-2">Aksi</th>
                <th class="col-md-2">Nama</th>
                <th class="col-md-2">NIK</th>
                <th class="col-md-2">Tanggal Lahir</th>
                <th class="col-md-2">Alamat</th>
                <th class="col-md-2">Jenis Kelamin</th>
                <th class="col-md-2">Timestamp</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = $dataPenduduk->firstItem() ?>
            @foreach ($dataPenduduk as $item)
            <tr>
            <td>{{$i}}</td>
            <td>
                <a href='{{ url('penduduk/'.$item->id.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                <form onsubmit="return confirm('Yakin menghapus data?')" class='d-inline' action="{{ url('penduduk/'.$item->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                </form>

            </td>
            <td>{{$item->nama}}</td>
            <td>{{$item->nik}}</td>
            <td>{{$item->tanggal_lahir}}</td>
            <td>{{$item->alamat}}</td>
            <td>{{$item->jenis_kelamin}}</td>
            <td>{{$item->created_at}}</td>
            </tr>
            <?php $i++ ?>
            @endforeach

        </tbody>
    </table>
    
</div>
<!-- AKHIR DATA -->
@endsection