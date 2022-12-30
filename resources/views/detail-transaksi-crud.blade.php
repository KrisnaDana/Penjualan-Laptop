@extends('layout')




@if(!empty($index))
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
        <input type="text" class="form-control" value="Rp{{$transaksi->total}}" readonly>
    </div>
</div>

<table class="table">
    <thead>
        <tr>
            <th class="col-1" scope="col">No</th>
            <th class="col-3" scope="col">Nama Laptop</th>
            <th class="col-2" scope="col">Harga</th>
            <th class="col-1" scope="col">Stok</th>
            <th class="col-2" scope="col">Perusahaan</th>
            <th class="col-1" scope="col">Jumlah Pembelian</th>
            <th class="col-1 text-center" scope="col">Pengaturan</th>
        </tr>
    </thead>
    <tbody>
        @foreach($laptop as $laptops)
        <tr>
            <form method="post" action="{{route('detail-transaksi-tambah-submit', ['id_transaksi' => $transaksi->id, 'id_laptop' => $laptops->id])}}">
                @csrf
                <th scope="row">{{$loop->index+1+($laptop->currentPage()-1)*10}}</th>
                <td>{{$laptops->nama}}</td>
                <td>Rp{{$laptops->harga}}</td>
                <td>{{$laptops->stok}}</td>
                <td>{{$laptops->perusahaan->nama}}</td>
                <td>
                    <input type="number" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" value="{{old('jumlah')}}">
                    @error('jumlah')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </td>
                <td class="text-center">
                    <button class="btn material-icons" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        more_vert
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a type="button" class="dropdown-item" href="{{route('detail-transaksi-tambah-laptop', ['id_transaksi' => $transaksi->id, 'id_laptop' => $laptops->id])}}">Detail</a>
                        </li>
                        <li>
                            <button class="dropdown-item" type="submit">Tambah</button>
                        </li>
                    </ul>
                </td>
            </form>
        </tr>
        @endforeach
    </tbody>
</table>
{{$laptop->links()}}

@endsection
@endif

@if(!empty($detail_laptop))
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
    <label class="col-sm-2 col-form-label">Stok</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" value="{{$laptop->stok}}" readonly>
    </div>
</div>

<div class="mb-3 row">
    <label class="col-sm-2 col-form-label">harga</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" value="Rp{{$laptop->harga}}" readonly>
    </div>
</div>

<div class="text-end">
    <a type="button" class="btn btn-danger" href="{{route('detail-transaksi-tambah', $transaksi->id)}}">Kembali</a>
</div>
@endsection
@endif