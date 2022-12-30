@extends('layout')





@if(!empty($detail))
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
    <a type="button" class="btn btn-danger" href="{{route('laptop')}}">Kembali</a>
</div>
@endsection
@endif






@if(!empty($tambah))
@section('title', 'Penjualan Laptop | Detail Laptop')
@section('body')
<form method="post" action="{{route('laptop-tambah-submit')}}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Nama Laptop</label>
        <div class="col-sm-10">
            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{old('nama')}}">
            @error('nama')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>

    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Perusahaan Laptop</label>
        <div class="col-sm-10">
            <select name="perusahaan" class="form-control">
                @foreach($perusahaan as $perusahaans)
                <option value="{{$perusahaans->id}}">{{$perusahaans->nama}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Spesifikasi</label>
        <div class="col-sm-10">
            <textarea name="spesifikasi" class="form-control @error('spesifikasi') is-invalid @enderror" rows="3">{{old('spesifikasi')}}</textarea>
            @error('spesifikasi')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>

    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Stok</label>
        <div class="col-sm-10">
            <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror" value="{{old('stok')}}">
            @error('stok')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>

    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">harga</label>
        <div class="col-sm-10">
            <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{old('harga')}}">
            @error('harga')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>

    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Gambar</label>
        <div class="col-sm-10">
            <input class="form-control @error('gambar') is-invalid @enderror" type="file" name="gambar">
            @error('gambar')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>

    <div class="text-end">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a type="button" class="btn btn-danger" href="{{route('laptop')}}">Kembali</a>
    </div>
</form>
@endsection
@endif






@if(!empty($ubah))
@section('title', 'Penjualan Laptop | Ubah Laptop')
@section('body')
<img src="{{asset('storage/' . $laptop->gambar)}}" class="img-thumbnail mb-3" style="max-width:500px; min-width:400px;">
<form method="post" action="{{route('laptop-ubah-submit', $laptop->id)}}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Nama Laptop</label>
        <div class="col-sm-10">
            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{old('nama') ?? $laptop->nama}}">
            @error('nama')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>

    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Perusahaan Laptop</label>
        <div class="col-sm-10">
            <select name="perusahaan" class="form-control">
                @foreach($perusahaan as $perusahaans)
                @if($laptop->perusahaan_id == $perusahaans->id)
                <option selected value="{{$perusahaans->id}}">{{$perusahaans->nama}}</option>
                @else
                <option value="{{$perusahaans->id}}">{{$perusahaans->nama}}</option>
                @endif
                @endforeach
            </select>
        </div>
    </div>

    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Spesifikasi</label>
        <div class="col-sm-10">
            <textarea name="spesifikasi" class="form-control @error('spesifikasi') is-invalid @enderror" rows="3">{{old('spesifikasi') ?? $laptop->spesifikasi}}</textarea>
            @error('spesifikasi')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>

    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Stok</label>
        <div class="col-sm-10">
            <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror" value="{{old('stok') ?? $laptop->stok}}">
            @error('stok')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>

    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">harga</label>
        <div class="col-sm-10">
            <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{old('harga') ?? $laptop->harga}}">
            @error('harga')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>

    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Gambar</label>
        <div class="col-sm-10">
            <input class="form-control @error('gambar') is-invalid @enderror" type="file" name="gambar">
            @error('gambar')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>

    <div class="text-end">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a type="button" class="btn btn-danger" href="{{route('laptop')}}">Kembali</a>
    </div>
</form>
@endsection
@endif