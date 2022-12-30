@extends('layout')

@section('title', 'Penjualan Laptop | Transaksi Detail')

@section('body')
<a class="btn btn-primary mb-3" type="button" href="{{route('detail-transaksi-tambah', $transaksi->id)}}">Tambah Laptop</a>

<div class="mb-3 row">
    <label class="col-sm-2 col-form-label">Nama Customer</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" value="{{$transaksi->nama}}" readonly>
    </div>
</div>

<div class="mb-3 row">
    <label class="col-sm-2 col-form-label">No Telepon</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" value="{{$transaksi->no_telepon}}" readonly>
    </div>
</div>

<div class="mb-3 row">
    <label class="col-sm-2 col-form-label">Total</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" value="Rp{{$transaksi->total}}" readonly>
    </div>
</div>

<table class="table">
    <thead>
        <tr>
            <th class="col-1" scope="col">No</th>
            <th class="col-3" scope="col">Nama Laptop</th>
            <th class="col-3" scope="col">Jumlah</th>
            <th class="col-3" scope="col">Total</th>

            <th class="col-2 text-center" scope="col">Pengaturan</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transaksi_detail as $transaksi_details)
        <tr>
            <th scope="row">{{$loop->index+1+($transaksi_detail->currentPage()-1)*10}}</th>
            <td>{{$transaksi_details->laptop->nama}}</td>
            <td>{{$transaksi_details->jumlah}}</td>
            <td>Rp{{$transaksi_details->subtotal}}</td>
            <td class="text-center">
                <button class="btn material-icons" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    more_vert
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a type="button" class="dropdown-item" href="#">Detail</a>
                    </li>
                </ul>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$transaksi_detail->links()}}
@endsection