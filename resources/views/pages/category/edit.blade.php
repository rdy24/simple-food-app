@extends('layouts.app')

@section('title')
Edit Data Kategori
@endsection

@push('css-libraries')
<link rel="stylesheet" href={{ asset("assets/module/bootstrap-daterangepicker/daterangepicker.css") }}>
<link rel="stylesheet" href={{ asset("assets/module/bootstrap-tagsinput/dist/bootstrap-tagsinput.css") }}>
@endpush

@section('content')
<div class="section-header">
  <h1>Edit Data Kategori</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
    <div class="breadcrumb-item"><a href="#">Data Kategori</a></div>
    <div class="breadcrumb-item active">Edit Data</div>
  </div>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <form action="{{ route('dashboard.category.update', $category->uuid) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
              <label for="name">Nama Kategori</label>
              <input type="text" class="form-control" id="name" name="name" required
                value="{{ old('name', $category->name) }}">
              @error('name')
              <p class="text-danger">
                {{ $message }}
              </p>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">Ubah</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js-libraries')
<script src={{ asset("assets/module/bootstrap-daterangepicker/daterangepicker.js") }}></script>
<script src={{ asset("assets/module/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js") }}></script>
@endpush