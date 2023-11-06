@extends('layouts.main')
@section('content')
  <div class="pagetitle">
    <h1>Dependent Dropdown</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('dropdown') }}">Dropdown</a></li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-6">

        <div class="card">
          <div class="card-body">
            <div class="mb-3 mt-2">
              <label for="exampleInputEmail1" class="form-label">Provinsi</label>
              <select class="form-select" aria-label="Default select example" id="provinsi">
                <option selected disabled>pilih</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Kabupaten</label>
              <select class="form-select" aria-label="Default select example" id="kabupaten">
                <option selected disabled>pilih</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Kecamatan</label>
              <select class="form-select" aria-label="Default select example" id="kecamatan">
                <option selected disabled>pilih</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Kelurahan</label>
              <select class="form-select" aria-label="Default select example" id="kelurahan">
                <option selected disabled>pilih</option>
              </select>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>


  <script>
    $(function() {
      get_wilayah(`https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json`, '#provinsi')
    })

    $('#provinsi').on('change', function() {
      let val = $(this).val();

      $(`#kabupaten option`).remove();
      $(`#kecamatan option`).remove();
      $(`#kelurahan option`).remove();
      get_wilayah(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${val}.json`, '#kabupaten')
    })

    $('#kabupaten').on('change', function() {
      let val = $(this).val();

      $(`#kecamatan option`).remove();
      $(`#kelurahan option`).remove();
      get_wilayah(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${val}.json`, '#kecamatan')
    })

    $('#kecamatan').on('change', function() {
      let val = $(this).val();

      $(`#kelurahan option`).remove();
      get_wilayah(`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${val}.json`, '#kelurahan')
    })

    function get_wilayah(url, idElement) {
      $.ajax({
        type: 'GET',
        url: url,
        success: function(response) {
          $(`${idElement} option`).remove();
          $(`${idElement}`).append(`<option selected disabled>pilih</option>`);
          response.forEach(element => {
            $(`${idElement}`).append(`<option value="${element.id}">${element.name}</option>`);
          });
        }
      });
    }
  </script>
@endsection
