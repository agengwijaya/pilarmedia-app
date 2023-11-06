@extends('layouts.main')
@section('content')
  <div class="pagetitle">
    <h1>OOP</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('oop') }}">OOP</a></li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Encapsulation</h5>
            <h4>Hasil : {{ $encapsulation }}</h4>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Inheritance</h5>
            <h4>Hasil : {{ $inheritance }}</h4>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Polymorphism</h5>
            <h4>Hasil : {{ $polymorphism }}</h4>
          </div>
        </div>
      </div>
  </section>
@endsection
