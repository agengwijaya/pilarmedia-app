<?php

namespace App\Http\Controllers\OOP;

use App\Http\Controllers\Controller;
use BinatangDarat;
use Ikan;
use Illuminate\Http\Request;
use Manusia;

require_once('Inheritance.php');
require_once('Encapsulation.php');
require_once('Polymorphism.php');

class OOPController extends Controller
{
    public function index()
    {
        $encapsulation = new Ikan();
        $inheritance = new Manusia();
        $inheritance->jenis('Kulit Cerah');
        $data_inherit = $inheritance->nama;
        $polymorphism = new BinatangDarat();

        return view('oop.index', [
            'encapsulation' => $encapsulation->ciri_ciri('Putih'),
            'inheritance' => $data_inherit,
            'polymorphism' => $polymorphism->jenis_kelamin('laki-laki'),
        ]);
    }
}
