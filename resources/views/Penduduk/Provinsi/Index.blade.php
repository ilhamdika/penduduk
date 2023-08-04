@extends('Layout.Layout')
<!-- START DATA -->
@section('konten')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <!-- FORM PENCARIAN -->
    <h1>Daftar Provinsi</h1>

    <a href='{{ url('penduduk/create') }}' class="btn btn-secondary">kembali</a>
    <a href='{{ url('provinsi/create') }}' class="btn btn-primary">+ Tambah Data</a>
    <!-- TOMBOL TAMBAH DATA -->


    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-2">Aksi</th>
                <th class="col-md-4">Nama Provinsi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = $dataProvinsi->firstItem() ?>
            @foreach ($dataProvinsi as $item)
            <tr>
                <td>{{$i}}</td>
                <td>
                    <a href='{{ url('provinsi/'.$item->id.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                    <form onsubmit="return confirm('Yakin menghapus data?')" class='d-inline' action="{{ url('provinsi/'.$item->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                    </form>
                    
                </td>
                <td>{{$item->nama_provinsi}}</td>
            </tr>
            <?php $i++ ?>
            @endforeach
        </tbody>
    </table>
    {{ $dataProvinsi->links()}}
</div>
<!-- AKHIR DATA -->
@endsection