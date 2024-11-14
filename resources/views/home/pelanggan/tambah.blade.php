@extends('layouts.master')
@section('title','Table Pelanggan')
@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card"> 
                        <div class="card-header">
                            <h3>Halaman Tambah Data</h3>
                            <a class="btn btn-warning" href="/pelanggan">Kembali</a>
                        </div>
                        <div class="card-body">
                            <form action="/pelanggan/simpan" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                                    <input 
                                        type="text"
                                        class="form-control"
                                        name="nama_pelanggan"
                                        id="nama_pelanggan"
                                        placeholder="Masukkan nama pelanggan">
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                  <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="no_telp" class="form-label">No Telepon</label>
                                    <input 
                                        type="no_telp"
                                        class="form-control"
                                        name="no_telp"
                                        id="no_telp"
                                        placeholder="Masukkan no telepon">
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
