@extends('layout')






@if(!empty($tambah))
@section('title', 'Penjualan Laptop | Tambah Perusahaan')
@section('body')
<form method="post" action="{{route('perusahaan-tambah-submit')}}">
    @csrf
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Nama Perusahaan</label>
        <div class="col-sm-10">
            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{old('nama')}}">
            @error('nama')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>

    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Alamat Perusahaan</label>
        <div class="col-sm-10">
            <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{old('alamat')}}">
            @error('alamat')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>

    <div class="text-end">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a type="button" class="btn btn-danger" href="{{route('perusahaan')}}">Kembali</a>
    </div>
</form>
@endsection
@endif






@if(!empty($ubah))
@section('title', 'Penjualan Laptop | Ubah Perusahaan')
@section('body')
<form method="post" action="{{route('perusahaan-ubah-submit', $perusahaan->id)}}">
    @csrf
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Nama Perusahaan</label>
        <div class="col-sm-10">
            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{old('nama') ?? $perusahaan->nama}}">
            @error('nama')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>

    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Alamat Perusahaan</label>
        <div class="col-sm-10">
            <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{old('alamat') ?? $perusahaan->alamat}}">
            @error('alamat')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>

    <div class="text-end">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a type="button" class="btn btn-danger" href="{{route('perusahaan')}}">Kembali</a>
    </div>
</form>
@endsection
@endif