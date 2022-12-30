@extends('layout')




@if(!empty($detail))
@section('title', 'Penjualan Laptop | Detail Transaksi')
@section('body')
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
        <input type="text" class="form-control" value="{{$transaksi->total}}" readonly>
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
                        <a type="button" class="dropdown-item" href="{{route('transaksi-detail-laptop', ['id_transaksi' => $transaksi->id, 'id_laptop' => $transaksi_details->laptop->id])}}">Detail</a>
                    </li>
                </ul>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$transaksi_detail->links()}}


<div class="text-end">
    <a type="button" class="btn btn-danger" href="{{route('transaksi')}}">Kembali</a>
</div>

@endsection
@endif





@if(!empty($laptop))
@section('title', 'Penjualan Laptop | Detail Laptop')
@section('body')
<img src="{{asset('storage/' . $laptop->gambar)}}" class="img-thumbnail mb-3" style="max-width:500px; min-width:400px;">
<div class="mb-3 row">
    <label class="col-sm-2 col-form-label">Nama Laptop</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" value="{{$laptop->nama}}" readonly>
    </div>
</div>

<div class="mb-3 row">
    <label class="col-sm-2 col-form-label">Perusahaan Laptop</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" value="{{$laptop->perusahaan->nama}}" readonly>
    </div>
</div>

<div class="mb-3 row">
    <label class="col-sm-2 col-form-label">Spesifikasi</label>
    <div class="col-sm-10">
        <textarea name="spesifikasi" class="form-control" rows="3" readonly>{{$laptop->spesifikasi}}</textarea>
    </div>
</div>

<div class="mb-3 row">
    <label class="col-sm-2 col-form-label">harga</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" value="Rp{{$laptop->harga}}" readonly>
    </div>
</div>

<div class="text-end">
    <a type="button" class="btn btn-danger" href="{{route('transaksi-detail', $transaksi->id)}}">Kembali</a>
</div>

@endsection
@endif







@if(!empty($tambah))
@section('title', 'Penjualan Laptop | Tambah Transaksi')
@section('body')
<form method="post" action="{{route('transaksi-tambah-submit')}}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Nama Customer</label>
        <div class="col-sm-10">
            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{old('nama')}}">
            @error('nama')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>

    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">No Telepon</label>
        <div class="col-sm-10">
            <input type="text" name="no_telepon" class="form-control @error('no_telepon') is-invalid @enderror" value="{{old('no_telepon')}}">
            @error('no_telepon')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>

    <div class="text-end">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a type="button" class="btn btn-danger" href="{{route('transaksi')}}">Kembali</a>
    </div>
</form>

@endsection
@endif