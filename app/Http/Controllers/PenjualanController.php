<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjualan;
use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\Produk;
use App\Models\Pelanggan;
use App\Models\User;


class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penjualan = Penjualan::all();
        return view('home.penjualan.index', compact('penjualan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pelanggan = Pelanggan::all();
        $user = User::all();
        return view('home.penjualan.tambah', compact('pelanggan','user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        if($request->nama_pelanggan != null){
            
            Penjualan::create([
                'id_pelanggan' => $request->nama_pelanggan,
                'tanggal_penjualan' => now(),
                'total_harga' => 0,
                'total_bayar' => 0,
                'kembalian' => 0,
            ]);
    
            return redirect('/penjualan')->with('berhasil', 'Data berhasil ditambah');
        } else {
            Penjualan::create([
                'id_pelanggan' => null,
                'tanggal_penjualan' => now(),
                'total_harga' => 0,
                'total_bayar' => 0,
                'kembalian' => 0,
            ]);
    
            return redirect('/penjualan')->with('berhasil', 'Data berhasil ditambah');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $penjualan = Penjualan::find($id);
       $detailpenjualan = DetailPenjualan::where('id_penjualan', $id)->get();
       return view('home.penjualan.struk',compact('penjualan','detailpenjualan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produk = Produk::all();
        $total_harga = DetailPenjualan::where('id_penjualan', $id)->sum('subtotal');
        $detailpenjualan = DetailPenjualan::where('id_penjualan', $id)->get();
        $penjualan = Penjualan::find($id);
        return view('home.penjualan.detailpenjualan.tambah', compact('penjualan','produk','detailpenjualan','total_harga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       if($request->total_harga > $request->total_bayar){
        return redirect()->back()->with('gagal','Uang anda kurang');
       } else {
        $penjualan = Penjualan::find($id);
        $kembalian = $request->total_bayar - $request->total_harga;
        $penjualan->update([
            'total_harga' => $request->total_harga,
            'total_bayar' => $request->total_bayar,
            'kembalian' => $kembalian,
        ]);
        return redirect('/penjualan');
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $penjualan = Penjualan::find($id);
        $penjualan->delete();
        return redirect('/penjualan');
    }
}
