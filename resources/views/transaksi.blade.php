@extends('layout')

@section('title', 'Penjualan Laptop | Transaksi')

@section('body')
<a class="btn btn-primary mb-3" type="button" href="{{route('transaksi-tambah')}}">Tambah Transaksi</a>

<table class="table">
    <thead>
        <tr>
            <th class="col-1" scope="col">No</th>
            <th class="col-3" scope="col">Nama Customer</th>
            <th class="col-3" scope="col">No Telepon</th>
            <th class="col-3" scope="col">Total</th>
            <th class="col-2 text-center" scope="col">Pengaturan</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transaksi as $transaksis)
        <tr>
            <th scope="row">{{$loop->index+1+($transaksi->currentPage()-1)*10}}</th>
            <td>{{$transaksis->nama}}</td>
            <td>{{$transaksis->no_telepon}}</td>
            <td>Rp{{$transaksis->total}}</td>
            <td class="text-center">
                <button class="btn material-icons" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    more_vert
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a type="button" class="dropdown-item" href="{{route('transaksi-detail', $transaksis->id)}}">Detail</a>
                    </li>
                </ul>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$transaksi->links()}}
@endsection