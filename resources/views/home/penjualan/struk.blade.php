<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembelian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 300px;
            margin: auto;
            padding: 20px;
            background-color: #f9f9f9;
            color: #333;
        }
        .header, .footer {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h2 {
            margin: 5px 0;
            font-size: 1.4em;
        }
        .info, .items, .summary {
            margin: 10px 0;
            font-size: 0.9em;
        }
        .info div, .items div, .summary div {
            display: flex;
            justify-content: space-between;
        }
        .items {
            border-top: 1px dashed #ccc;
            border-bottom: 1px dashed #ccc;
            padding: 10px 0;
        }
        .summary div {
            padding: 5px 0;
            font-weight: bold;
        }
        .thanks {
            text-align: center;
            margin-top: 15px;
            font-style: italic;
            font-size: 0.85em;
        }
    </style>
</head>
<body onload="print()">
    <div class="header">
        <h2>Toko Serba Ada</h2>
        <p>Jl. Contoh Alamat No. 123, Kota</p>
        <p>Telp: 0123-456789</p>
    </div>
    
    <div class="items">
        <div><strong>Produk</strong><strong>Harga</strong></div>
        @foreach ($detailpenjualan as $dp)
        <div><span>{{ $dp->produk->nama_produk }}</span><span>{{number_format($dp->produk->harga) }}</span></div>
        @endforeach
    </div>
    
    <div class="summary">
        <div><span>Total</span><span>{{ number_format($penjualan->total_harga) }}</span></div>
        <div><span>Bayar</span><span>{{ number_format($penjualan->total_bayar) }}</span></div>
        <div><span>Kembali</span><span>{{ number_format($penjualan->kembalian) }}</span></div>
    </div>

    <div class="thanks">
        <p>Terima kasih telah berbelanja di Toko Serba Ada!</p>
        <p>Semoga hari Anda menyenangkan!</p>
    </div>

    <div class="footer">
        <p>--- Terima Kasih ---</p>
    </div>
</body>
</html>
