<?php

namespace App\Http\Controllers;

use App\Models\SalesPerson;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $tgl_awal = !empty($request->tgl_awal) ? $request->tgl_awal : date('Y-m-01');
        $tgl_akhir = !empty($request->tgl_akhir) ? $request->tgl_akhir : date('Y-m-d');

        $penjualan_sales = SalesPerson::with(['sales', 'sales.product'])
            ->whereRelation('sales', 'tanggal_transaksi', '>=', $tgl_awal)
            ->whereRelation('sales', 'tanggal_transaksi', '<=', $tgl_akhir)
            ->where('soft_delete', 1)->get();

        return view('dashboard', [
            'penjualan_sales' => $penjualan_sales,
            'tgl_awal' => $tgl_awal,
            'tgl_akhir' => $tgl_akhir,
        ]);
    }
}
