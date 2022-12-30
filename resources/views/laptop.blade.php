@extends('layout')

@section('title', 'Penjualan Laptop | Laptop')

@section('body')
<a class="btn btn-primary mb-3" type="button" href="{{route('laptop-tambah')}}">Tambah Laptop</a>

<table class="table">
    <thead>
        <tr>
            <th class="col-1" scope="col">No</th>
            <th class="col-3" scope="col">Nama Laptop</th>
            <th class="col-2" scope="col">Harga</th>
            <th class="col-2" scope="col">Stok</th>
            <th class="col-2" scope="col">Perusahaan</th>
            <th class="col-1 text-center" scope="col">Pengaturan</th>
        </tr>
    </thead>
    <tbody>
        @foreach($laptop as $laptops)
        <tr>
            <th scope="row">{{$loop->index+1+($laptop->currentPage()-1)*10}}</th>
            <td>{{$laptops->nama}}</td>
            <td>Rp{{$laptops->harga}}</td>
            <td>{{$laptops->stok}}</td>
            <td>{{$laptops->perusahaan->nama}}</td>
            <td class="text-center">
                <button class="btn material-icons" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    more_vert
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a type="button" class="dropdown-item" href="{{route('laptop-detail', $laptops->id)}}">Detail</a>
                    </li>
                    <li>
                        <a type="button" class="dropdown-item" href="{{route('laptop-ubah', $laptops->id)}}">Ubah</a>
                    </li>
                    <li>
                        <form method="post" action="{{route('laptop-hapus', $laptops->id)}}">
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
{{$laptop->links()}}
@endsection