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
                            <h3>Halaman Tambah Data Produk</h3>
                            <a class="btn btn-warning" href="/produk">Kembali</a>
                        </div>
                        <div class="card-body">
                            <form action="/produk/simpan" method="post" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="mb-3">
                                    <label for="nama_produk" class="form-label">Nama produk</label>
                                    <input 
                                        type="text"
                                        class="form-control"
                                        name="nama_produk"
                                        id="nama_produk"
                                        placeholder="Masukkan nama produk">
                                </div>
                                <div class="mb-3">
                                    <label for="harga" class="form-label">Harga</label>
                                    <input 
                                        type="number"
                                        class="form-control"
                                        name="harga"
                                        id="harga"
                                        placeholder="Masukkan harga produk">
                                </div>
                                <div class="mb-3">
                                    <label for="stok" class="form-label">Stok</label>
                                    <input 
                                        type="number"
                                        class="form-control"
                                        name="stok"
                                        id="stok"
                                        placeholder="Masukkan stok produk">
                                </div>
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
