@extends('Layout.Layout')
<!-- START DATA -->
@section('konten')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <!-- FORM PENCARIAN -->
    <h1>Daftar Kabupaten</h1>

    <a href='{{ url('penduduk/create') }}' class="btn btn-secondary">kembali</a>
    <a href='{{ url('kabupaten/create') }}' class="btn btn-primary">+ Tambah Data</a>
    <!-- TOMBOL TAMBAH DATA -->
    <div class="row pb-3">
        
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-2">Aksi</th>
                <th class="col-md-4">Nama Kabupaten</th>
                <th class="col-md-4">Nama Provinsi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = $dataKabupaten->firstItem() ?>
            @foreach ($dataKabupaten as $item)
            <tr>
                <td>{{$i}}</td>
                <td>
                    <a href='{{ url('kabupaten/'.$item->id.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                    <form onsubmit="return confirm('Yakin menghapus data?')" class='d-inline' action="{{ url('kabupaten/'.$item->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                    </form>
                    
                </td>
                <td>{{$item->nama_kabupaten}}</td>
                <td>{{$item->provinsi->nama_provinsi}}</td>
            </tr>
            <?php $i++ ?>
            @endforeach
        </tbody>
    </table>
    
</div>
<!-- AKHIR DATA -->
@endsection