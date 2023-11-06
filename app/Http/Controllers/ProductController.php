<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $produk = Product::where('soft_delete', 1)->get();

        return view('product.index', [
            'produk' => $produk
        ]);
    }

    public function simpan(Request $request) {

        $data = [
            'nama' => $request->nama,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi ?? '-',
            'created_by' => auth()->user()->id
        ];

        Product::create($data);

        return back();
    }

    public function update(Request $request, $id) {

        $data = [
            'nama' => $request->nama,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi ?? '-',
            'updated_by' => auth()->user()->id
        ];

        Product::where('id', $id)->update($data);

        return back();
    }

    public function hapus($id) {

        $data = [
            'soft_delete' => 0,
            'deleted_by' => auth()->user()->id,
        ];

        Product::where('id', $id)->update($data);

        return back();
    }
}
