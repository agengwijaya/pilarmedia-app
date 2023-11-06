<?php

namespace App\Http\Controllers;

use App\Models\SalesPerson;
use Illuminate\Http\Request;

class SalesPersonController extends Controller
{
    public function index()
    {
        $sales_person = SalesPerson::where('soft_delete', 1)->get();

        return view('sales_person.index', [
            'sales_person' => $sales_person
        ]);
    }

    public function simpan(Request $request) {

        $data = [
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat ?? '-',
            'created_by' => auth()->user()->id
        ];

        SalesPerson::create($data);

        return back();
    }

    public function update(Request $request, $id) {

        $data = [
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat ?? '-',
            'updated_by' => auth()->user()->id
        ];

        SalesPerson::where('id', $id)->update($data);

        return back();
    }

    public function hapus($id) {

        $data = [
            'soft_delete' => 0,
            'deleted_by' => auth()->user()->id,
        ];

        SalesPerson::where('id', $id)->update($data);

        return back();
    }
}
