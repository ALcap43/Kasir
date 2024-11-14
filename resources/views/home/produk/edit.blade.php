@extends('layouts.master')
@section('title','Table Produk')
@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Halaman Edit Data Produk</h3>
                            <a class="btn btn-warning" href="/produk">Kembali</a>
                        </div>
                        <div class="card-body">
                            <form action="/produk/{{$produk->id}}/update" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="gambar" class="form-label"> Gambar</label>
                                    <input
                                        type="file"
                                        class="form-control"
                                        name="gambar"
                                        id="gambar"
                                        value="{{ $produk->gambar }}"
                                        placeholder="Masukkan Gambar">
                                </div>
                                <div class="mb-3">
                                    <label for="nama_produk" class="form-label">Nama Produk</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="nama_produk"
                                        id="nama_produk"
                                        value="{{ $produk->nama_produk }}"
                                        placeholder="Masukkan nama produk">
                                </div>
                                <div class="mb-3">
                                    <label for="harga" class="form-label">Harga</label>
                                    <input
                                        type="decimal"
                                        class="form-control"
                                        name="harga"
                                        id="harga"
                                        value="{{ $produk->harga }}"
                                        placeholder="Masukkan harga produk">
                                </div>
                                <div class="mb-3">
                                    <label for="stok" class="form-label">Stok</label>
                                    <input
                                        type="stok"
                                        class="form-control"
                                        name="stok"
                                        id="stok"
                                        value="{{ $produk->stok }}"
                                        placeholder="Masukkan stok">
                                </div>
                                <button class="btn btn-primary" type="submit">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
