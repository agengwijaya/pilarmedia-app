<?php

class Ikan
{
  private $jenis;

  private function manfaat($text)
  {
    return $text;
  }

  public function ciri_ciri($value)
  {
    $this->jenis = $value;
    return 'Ikan ini berjenis ' . $this->jenis . ' dan memiliki ciri-ciri warna corak warna warni' . ' serta manfaat' . $this->manfaat('bagi kesehatan');
  }
}

// $data = new IkanEncapsulation;

// echo $data->ciri_ciri();
