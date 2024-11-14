@extends('layouts.master')
@section('title','Table Penjualan')
@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Halaman Edit Data Penjualan</h3>
                            <a class="btn btn-warning" href="/pelanggan">Kembali</a>
                        </div>
                        <div class="card-body">
                            <form action="/pelanggan/{{$pelanggan->id}}/update" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Penjualan</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="nama_pelanggan"
                                        id="nama_pelanggan"
                                        value="{{ $pelanggan->nama_pelanggan }}"
                                        placeholder="Masukkan nama pelanggan">
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input
                                        type="alamat"
                                        class="form-control"
                                        name="alamat"
                                        id="alamat"
                                        value="{{ $pelanggan->alamat }}"
                                        placeholder="Masukkan alamat pengguna">
                                </div>
                                <div class="mb-3">
                                    <label for="no_telp" class="form-label">No Telepon</label>
                                    <input
                                        type="no_telp"
                                        class="form-control"
                                        name="no_telp"
                                        id="no_telp"
                                        value="{{ $pelanggan->no_telp }}"
                                        placeholder="Masukkan no_telp">
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
