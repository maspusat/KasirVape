<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    public function card(Request $request){
        $barang = Barang::query();
    
        if ($request->has('cari')) {
            $barang = $barang->where('nama_barang', 'like', '%' . $request->get('cari') . '%');
        }
    
        $barang = $barang->get();
    
        return view('dashboard', compact('barang', 'request'));
    }
    

    public function tampilbar(Request $request){
        $barang = Barang::query();
        if ($request->has('cari')) {
            $barang = $barang->where('nama_barang', 'like', '%' . $request->get('cari') . '%');
        }
        $barang = $barang->paginate(10);
        return view('barang.barindex', compact('barang', 'request'));
    }



    public function store(Request $request){
        $validator = $request->validate([
            'nama_barang' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required',
        ]);

        Barang::create($validator);
        return redirect()->route('admin.bar.index');
    }

    public function create()
    {
        return view('barang.barcreate');
    }

    public function edit(Request $request, $id){
        $barang = Barang::find($id);
        return view('barang.baredit', compact('barang'));
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required',
        ]);
    
        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
    
        $barang = Barang::find($id);
        $barang->update([
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'stok' => $request->stok,
        ]);
    
        return redirect()->route('admin.bar.index');
    }

    public function delete(Request $request, $id){
        $barang = Barang::find($id);
    
        if($barang){
            $barang->delete();
        }
    
        return redirect()->route('admin.bar.index');
    }

}
