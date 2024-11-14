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
                            <h3>Halaman Tambah Data</h3>
                            <a class="btn btn-warning" href="/penjualan">Kembali</a>
                        </div>
                        <div class="card-body">
                            <form action="/penjualan/simpan" method="post" autocomplete="off">
                            @csrf
                            <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                            <div class="input-group input-group-outline mb-3">
                                <select class="form-control" name="nama_pelanggan" id="nama_pelanggan">
                                    <option value="">Pilih Pelanggan</option>
                                    @foreach ($pelanggan as $pelanggan)
                                        <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama_pelanggan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-info">Tambah Data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
