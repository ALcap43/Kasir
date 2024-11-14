@extends('layouts.master')
@section('title', 'Keranjang')
@section('content')

<div class="content-wrapper">
    <div class="section-content">
        <div class="container-fluid">
            <div class="row">
                <!-- Form Tambah Keranjang -->
                <div class="col-lg-5">
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-primary text-white">
                            <h3 class="mb-0"><i class="fas fa-cart-plus"></i> Tambah Keranjang</h3>
                        </div>
                        <div class="card-body">
                            <form action="/detailpenjualan/simpan" method="post">
                                @csrf
                                <input type="hidden" name="id_penjualan" value="{{ $penjualan->id }}">
                                <div class="mb-3">
                                    <label for="id_produk" class="form-label">Nama Produk</label>
                                    <select name="id_produk" id="id_produk" class="form-control" required>
                                        <option value="">Pilih Produk</option>
                                        @foreach ($produk as $produk)
                                            <option value="{{ $produk->id }}">{{ $produk->nama_produk }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="jumlah" class="form-label">Jumlah</label>
                                    <input
                                        type="number"
                                        class="form-control"
                                        name="jumlah"
                                        id="jumlah"
                                        required
                                        min="1"
                                        placeholder="Masukkan jumlah"
                                    />
                                </div>
                                <button type="submit" class="btn btn-success w-100"><i class="fas fa-plus"></i> Tambah Keranjang</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Daftar Keranjang -->
                <div class="col-lg-7">
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-secondary text-white">
                            <h3 class="mb-0"><i class="fas fa-shopping-cart"></i> Keranjang</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Nama Produk</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Subtotal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($detailpenjualan as $dp)
                                            <tr>
                                                <td>{{ $dp->produk->nama_produk }}</td>
                                                <td>Rp{{ number_format($dp->produk->harga) }}</td>
                                                <td>{{ $dp->jumlah_produk }}</td>
                                                <td>Rp{{ number_format($dp->subtotal) }}</td>
                                                <td>
                                                    <a href="/detailpenjualan/{{ $dp->id }}/delete" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash-alt"></i> Hapus
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Total dan Pembayaran -->
                            <form action="/penjualan/{{ $penjualan->id }}/update" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="total_harga" class="form-label">Total Harga</label>
                                    <input
                                        type="number"
                                        class="form-control"
                                        name="total_harga"
                                        id="total_harga"
                                        readonly
                                        value="{{ $total_harga }}"
                                    />
                                </div>
                                <div class="mb-3">
                                    <label for="total_bayar" class="form-label">Total Bayar</label>
                                    <input
                                        type="number"
                                        class="form-control"
                                        name="total_bayar"
                                        id="total_bayar"
                                        placeholder="Masukkan jumlah bayar"
                                        required
                                    />
                                </div>
                                <button type="submit" class="btn btn-primary w-100"><i class="fas fa-credit-card"></i> Bayar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if (session('gagal'))
    <script>
        alert("{{ session('gagal') }}");
    </script>
@endif

@endsection
