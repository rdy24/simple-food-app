@extends('layouts.app')

@section('title')
Data {{ $food->name }}
@endsection

@section('content')
<div class="section-header">
  <h1>Data {{ $food->name }}</h1>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              <tr>
                <th>Nama Makanan</th>
                <td>{{ $food->name }}</td>
              </tr>
              <tr>
                <th>kategori</th>
                <td>{{ $food->category->name }}</td>
              </tr>
              <tr>
                <th>Deskripsi</th>
                <td>{{ $food->description }}</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection