<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sales;
use App\Models\SalesPerson;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        $sales = Sales::with(['product', 'sales_person'])->where('soft_delete', 1)->get();
        $product = Product::where('soft_delete', 1)->get();
        $sales_person = SalesPerson::where('soft_delete', 1)->get();

        return view('sales.index', [
            'sales' => $sales,
            'product' => $product,
            'sales_person' => $sales_person,
        ]);
    }

    public function simpan(Request $request) {

        $data = [
            'products_id' => $request->products_id,
            'sales_person_id' => $request->sales_person_id,
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'sales_amount' => $request->sales_amount,
            'created_by' => auth()->user()->id
        ];

        Sales::create($data);

        return back();
    }

    public function update(Request $request, $id) {

        $data = [
            'products_id' => $request->products_id,
            'sales_person_id' => $request->sales_person_id,
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'sales_amount' => $request->sales_amount,
            'updated_by' => auth()->user()->id
        ];

        Sales::where('id', $id)->update($data);

        return back();
    }

    public function hapus($id) {

        $data = [
            'soft_delete' => 0,
            'deleted_by' => auth()->user()->id,
        ];

        Sales::where('id', $id)->update($data);

        return back();
    }
}
