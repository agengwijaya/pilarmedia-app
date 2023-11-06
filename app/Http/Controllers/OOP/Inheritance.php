<?php

// abstract class Makhluk
// {
//   private $jenis;

//   public function jenis()
//   {
//     return $this->jenis;
//   }
// }

// class Manusia extends Makhluk
// {
//   private $jenis;

//   function __construct($jenis)
//   {
//     $this->jenis = $jenis;
//   }

//   public function data()
//   {
//     return 'Ini adalah jenis makhluk ' . $this->jenis;
//   }
// }

abstract class Makhluk
{

  public $nama;

  function nama($value)
  {
    $this->nama = $value;
  }
}

class Manusia extends Makhluk
{

  public $nama;

  function jenis($value)
  {
    $this->nama = $value;
  }
}
