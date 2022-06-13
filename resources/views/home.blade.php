@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{route('addProduk')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="Kategori_Produk" class="form-label">Kategori Produk</label>
                            <input type="number" name="kategori_id"
                                class="form-control @error('kategori_id') is-invalid @enderror" id="Kategori_Produk">

                            @error('kategori_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="Nama_Produk" class="form-label">Nama Produk</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                id="Nama_Produk">

                            @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="Harga_Produk" class="form-label">Harga Produk</label>
                            <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror"
                                id="Harga_Produk">

                            @error('harga')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="Deskripsi_Produk" class="form-label">Deskripsi Produk</label>
                            <input type="text" name="deskripsi"
                                class="form-control @error('deskripsi') is-invalid @enderror" id="Deskripsi_Produk">
                            @error('deskripsi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="Gambar" class="form-label">Gambar Produk</label>
                            <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror"
                                id="Gambar">

                            @error('gambar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection