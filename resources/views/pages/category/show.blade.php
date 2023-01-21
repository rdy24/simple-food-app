@extends('layouts.app')

@section('title')
Data Makanan {{ $category->name }}
@endsection

@push('css-libraries')
<link rel="stylesheet" href={{ asset("assets/module/datatables.net-bs4/css/dataTables.bootstrap4.min.css") }}>
<link rel="stylesheet" href={{ asset("assets/module/datatables.net-select-bs4/css/select.bootstrap4.min.css") }}>
@endpush

@section('content')
<div class="section-header">
  <h1>Data Makanan {{ $category->name }}</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
    <div class="breadcrumb-item">Data Makanan</div>
  </div>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body d-flex justify-content-between">
          <a href="{{ route('dashboard.category.index') }}" class="btn btn-dark"><i class="fas fa-arrow-left"
              aria-hidden="true"></i>
            Back</a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="table-1">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">Nama Makanan</th>
                  <th class="d-none"></th>
                  <th class="d-none"></th>
                </tr>
              </thead>
              <tbody>
                @forelse ($foods as $food)
                <tr>
                  <td class="text-center">{{ $loop->iteration }}</td>
                  <td class="text-center">{{ $food->name }}</td>
                  <td class="d-none"></td>
                  <td class="d-none"></td>
                </tr>
                @empty
                <tr>
                  <td colspan="2" class="text-center">Tidak ada data</td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js-libraries')
<script src={{ asset("assets/module/datatables/media/js/jquery.dataTables.min.js") }}></script>
<script src={{ asset("assets/module/datatables.net-bs4/js/dataTables.bootstrap4.min.js") }}></script>
<script src={{ asset("assets/module/datatables.net-select-bs4/js/select.bootstrap4.min.js") }}></script>
<script src={{ asset("assets/module/sweetalert/dist/sweetalert.min.js") }}></script>
@endpush

@push('js-page')
<script src={{ asset("assets/js/page/modules-datatables.js") }}></script>
@endpush