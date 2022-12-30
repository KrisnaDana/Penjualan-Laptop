@extends('layout')

@section('title', 'Penjualan Laptop | Perusahaan')

@section('body')

<a class="btn btn-primary mb-3" type="button" href="{{route('perusahaan-tambah')}}">Tambah Perusahaan</a>

<table class="table">
    <thead>
        <tr>
            <th class="col-1" scope="col">No</th>
            <th class="col-4" scope="col">Nama Perusahaan</th>
            <th class="col-4" scope="col">Alamat</th>
            <th class="col-1 text-center" scope="col">Pengaturan</th>
        </tr>
    </thead>
    <tbody>
        @foreach($perusahaan as $perusahaans)
        <tr>
            <th scope="row">{{$loop->index+1+($perusahaan->currentPage()-1)*10}}</th>
            <td>{{$perusahaans->nama}}</td>
            <td>{{$perusahaans->alamat}}</td>
            <td class="text-center">
                <button class="btn material-icons" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    more_vert
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a type="button" class="dropdown-item" href="{{route('perusahaan-ubah', $perusahaans->id)}}">Ubah</a>
                    </li>
                    <li>
                        <form method="post" action="{{route('perusahaan-hapus', $perusahaans->id)}}">
                            @csrf
                            <button class="dropdown-item" type="submit">Hapus</button>
                        </form>
                    </li>
                </ul>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$perusahaan->links()}}

@endsection