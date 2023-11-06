@extends('layouts.main')
@section('content')
  <div class="pagetitle">
    <h1>Sales</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Penjualan Sales</a></li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Sales</h5>
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalAdd">
              Tambah Penjualan Sales
            </button>
            <table class="table" id="transaksi">
              <thead>
                <tr>
                  <th>Nama Sales</th>
                  <th>Nama Product</th>
                  <th>Sales Amount</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($sales as $item)
                  <tr>
                    <td>{{ $item->sales_person->nama }}</td>
                    <td>{{ $item->product->nama }}</td>
                    <td>Rp {{ number_format($item->sales_amount, 0, ',', '.') }}</td>
                    <td class="">
                      <button class="btn btn-danger btn-xs" id="btn_delete" data-bs-target="#modalDeleteConfirm" data-bs-toggle="modal" data-id="{{ $item->id }}"><i class="fa fa-trash"></i></button>
                      <button class="btn btn-warning btn-xs" id="btn_edit" data-bs-target="#modalEdit" data-bs-toggle="modal" data-data='{{ $item }}'><i class="fa fa-pencil"></i></button>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

      </div>
  </section>

  <!-- Modal -->
  <div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{ url('sales') }}" method="post">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="modalAddLabel">Tambah Penjualan Sales</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="nama" class="form-label">Sales Person</label>
              <select class="form-select" aria-label="Default select example" id="sales_person_id" name="sales_person_id" required>
                <option selected disabled>pilih</option>
                @foreach ($sales_person as $item)
                  <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="products_id" class="form-label">Product</label>
              <select class="form-select" aria-label="Default select example" id="products_id" name="products_id" required>
                <option selected disabled>pilih</option>
                @foreach ($product as $item)
                  <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="sales_amount" class="form-label">Sales Amount</label>
              <input type="number" class="form-control" id="sales_amount" name="sales_amount">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="post" id="form_edit">
          @method('put')
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="modalEditLabel">Edit Produk</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="nama" class="form-label">Sales Person</label>
              <select class="form-select" aria-label="Default select example" id="sales_person_id_edit" name="sales_person_id" required>
                <option selected disabled>pilih</option>
                @foreach ($sales_person as $item)
                  <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="products_id" class="form-label">Product</label>
              <select class="form-select" aria-label="Default select example" id="products_id_edit" name="products_id" required>
                <option selected disabled>pilih</option>
                @foreach ($product as $item)
                  <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="sales_amount" class="form-label">Sales Amount</label>
              <input type="number" class="form-control" id="sales_amount_edit" name="sales_amount">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    $(function() {
      let table = $('#transaksi').DataTable({});

      $('#transaksi').on('click', 'tbody td #btn_edit', function() {
        let data = $(this).data('data');
        $('#form_edit').attr('action', "{{ url('sales/') }}" + '/' + data.id);
        $('#sales_person_id_edit').val(data.sales_person_id);
        $('#products_id_edit').val(data.products_id);
        $('#sales_amount_edit').val(data.sales_amount);
      })

      $('#transaksi').on('click', 'tbody td #btn_delete', function() {
        let id = $(this).attr('data-id');
        $('#form_delete').attr('action', "{{ url('sales/') }}" + '/' + id);
      })
    })
  </script>
@endsection
