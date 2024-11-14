<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailPenjualan;
use App\Models\Produk;

class DetailPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $produk = Produk::find($request->id_produk);
        
        if($request->jumlah > $produk->stok){
            return redirect()->back()->with('gagal', 'Stok produk ini kurang');
        } else {
            $subtotal = $request->jumlah * $produk->harga;
            
            if(DetailPenjualan::where('id_penjualan', $request->id_penjualan)->where('id_produk', $request->id_produk)->first()){
               
                $detailpenjualan = DetailPenjualan::where('id_penjualan', $request->id_penjualan)->where('id_produk', $request->id_produk)->first();
               
                $detailpenjualan->update([
                    'jumlah_produk' => $detailpenjualan->jumlah_produk + $request->jumlah,
                    'subtotal' => $detailpenjualan->subtotal + $subtotal,
                ]);
               
                $produk->update([
                    'stok' => $produk->stok - $request->jumlah
                ]);
               
                return redirect()->back();
            } else {

                DetailPenjualan::create([
                    'id_penjualan' => $request->id_penjualan,
                    'id_produk' => $request->id_produk,
                    'jumlah_produk' => $request->jumlah,
                    'subtotal' => $subtotal,
                ]);
                $produk->update([
                    'stok' => $produk->stok - $request->jumlah
                ]);
                return redirect()->back();
                
            }

        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $detailpenjualan = DetailPenjualan::find($id);
        $produk = Produk::find($detailpenjualan->id_produk);
        $produk->update([
            'stok' => $produk->stok + $detailpenjualan->jumlah_produk,
        ]);

        $detailpenjualan->delete();
        return redirect()->back();
    }
}
