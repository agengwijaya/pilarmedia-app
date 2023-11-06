<?php

interface Binatang
{
  public function kaki($value);
  public function jenis_kelamin($value);
  public function warna($value);
}

class BinatangDarat implements Binatang
{
  public function kaki($value)
  {
    return $value;
  }

  public function jenis_kelamin($value)
  {
    return $value;
  }

  public function warna($value)
  {
    return $value;
  }
}

// $data = new Makhluk();

// echo $data->kaki();
// echo $data->jenis_kelamin();
// echo $data->warna();
