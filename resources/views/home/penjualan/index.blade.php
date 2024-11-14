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
                            @if (@session('success'))
                                <div class="alert alert-info">
                                        {{ session('success') }}
                                </div>
                            @endif
                            <h3>Halaman Data Penjualan</h3>
                            <a class="btn btn-primary" href="/penjualan/tambah">Tambah</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Nama Pelanggan</th>
                                            <th scope="col">Tanggal Penjualan</th>
                                            <th scope="col">Total Bayar</th>
                                            <th scope="col">Total Harga</th>
                                            <th scope="col">Kembalian</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($penjualan as $penjualan)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ optional($penjualan->pelanggan)->nama_pelanggan ?? 'Bukan Member' }}</td>
                                                <td>{{ $penjualan->tanggal_penjualan }}</td>
                                                <td>{{ number_format($penjualan->total_bayar) }}</td>
                                                <td>{{ number_format($penjualan->total_harga) }}</td>
                                                <td>{{ number_format($penjualan->kembalian) }}</td>
                                                <td>
                                                    @if ($penjualan->total_bayar == 0)
                                                    <a class="btn btn-warning" href="/penjualan/{{ $penjualan->id }}/edit">Isi Keranjang</a>
                                                    @else
                                                    <a class="btn btn-secondary" target="_blank" href="/penjualan/{{$penjualan->id}}/show">Cetak Struk</a>
                                                    @endif
                                                    <a class="btn btn-danger" href="/penjualan/{{ $penjualan->id }}/delete"
                                                       onclick="return confirm('Yakin Mau Di Hapus?')">Hapus</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
