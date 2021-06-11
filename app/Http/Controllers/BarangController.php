<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;
class BarangController extends Controller
{
   
    public function index(Request $request)
    {
        $cari = $request->cari;
        $barang = Barang::latest()->where('produk', 'like', "%" . $cari . "%")->paginate(5);
        return view('barang.index', compact('barang'));
    }

    public function create()
    {
        return view('barang.create');
    }
   
    public function store(Request $request)
    {
            $request->validate([
                'produk' => ['required', 'string', 'max:100'],
                'jumlah' => ['required', 'max:11'],
                'harga' => ['required', 'max:11'],
            ]);
            
            Barang::create([
                'produk' => $request->produk,
                'slug' => $request->produk,
                'harga' => $request->harga,
                'jumlah' => $request->jumlah,
            ]);

            return redirect()->route('barang.index')->with('status', 'Data Anda Berhasil di tambah');
    }

    
    public function edit($id)
    {
        $barang = Barang::find($id);
        return view('barang.edit', compact('barang'));
    }

   
    public function update(Request $request, $id)
    {   
        
        $request->validate([
            'produk' => ['required', 'string', 'max:100'],
            'jumlah' => ['required', 'max:11'],
            'harga' => ['required', 'max:11'],
        ]);
        $barang = Barang::find($id);
        $barang->update([
            'produk' => $request->produk,
            'slug' => $request->produk,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
        ]);
        
        return redirect()->route('barang.index')->with('status', 'Data Anda Berhasil di edit');

    }
 
    public function destroy($id)
    {
        $barang = Barang::find($id);
        if (!$barang) {
            return redirect()->back();
        }
        $barang->delete();
        return redirect()->route('barang.index')->with('status', 'Data Anda Berhasil di Edit');
    }
}