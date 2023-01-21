@extends('layouts.app')

@section('title')
Tambah Data Makanan
@endsection

@push('css-libraries')
<link rel="stylesheet" href={{ asset("assets/module/select2/dist/css/select2.min.css") }}>
<link rel="stylesheet" href={{ asset("assets/module/bootstrap-daterangepicker/daterangepicker.css") }}>
<link rel="stylesheet" href={{ asset("assets/module/bootstrap-tagsinput/dist/bootstrap-tagsinput.css") }}>
@endpush

@section('content')
<div class="section-header">
  <h1>Tambah Data Makanan</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
    <div class="breadcrumb-item"><a href="#">Data Makanan</a></div>
    <div class="breadcrumb-item active">Tambah Data</div>
  </div>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <form action="{{ route('dashboard.food.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="category_id">Kategori</label>
              <select name="category_id" required class="form-control select2">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id')==$category->id ? 'selected' : '' }}>
                  {{ $category->name }}
                </option>
                @endforeach
              </select>
              @error('category_id')
              <p class="text-danger">
                {{ $message }}
              </p>
              @enderror
            </div>
            <div class="form-group">
              <label for="name">Nama Makanan</label>
              <input type="text" class="form-control" id="name" name="name" required value="{{ old('name') }}">
              @error('name')
              <p class="text-danger">
                {{ $message }}
              </p>
              @enderror
            </div>
            <div class="form-group">
              <label for="description">Deskripsi</label>
              <textarea type="text" class="form-control" id="description" name="description" required
                style="height: 100px">{{ old('description') }}</textarea>
              @error('description')
              <p class="text-danger">
                {{ $message }}
              </p>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js-libraries')
<script src={{ asset("assets/module/select2/dist/js/select2.full.min.js") }}></script>
<script src={{ asset("assets/module/bootstrap-daterangepicker/daterangepicker.js") }}></script>
<script src={{ asset("assets/module/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js") }}></script>
@endpush