@extends('layouts.main')

@section('content')
<div class="pagetitle">
  <h1>Data Operator</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{ route('dataoperator.index') }}">Data Operator</a></li>
    </ol>
  </nav>
</div>
<div class="section dashboard">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mt-4 mb-3">
            <a href="{{ route('dataoperator.create') }}" class="btn btn-outline-primary">
              <i class="bi bi-plus"></i>Tambah Operator
            </a>
            <h1></h1>
            {{-- <span class="badge bg-primary">Primary</span> --}}
          </div>
          <table id="initDataTable" class="table" style="width:100%">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Kode</th>
                <th class="text-center">Username</th>
                <th class="text-center">Status</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($operators as $operator)    
                <tr>
                  <td class="text-center">{{ $loop->iteration }}</td>
                  <td class="text-center">{{ $operator->operator_nama }}</td>
                  <td class="text-center">{{ $operator->operator_kode }}</td>
                  <td class="text-center">{{ $operator->operator_username }}</td>
                  <td class="text-center">
                    @if($operator->operator_is_aktif == 1)
                      <span class="badge bg-success">Aktif</span>
                    @else
                      <span class="badge bg-warning">Tidak Aktif</span>
                    @endif
                  </td>
                  <td class="text-center">
                    <button type="button" class="btn btn-warning operator-button-set-status" data-bs-toggle="modal" data-id="{{ $operator->id }}" data-bs-target="#operator-modal-set-status">
                      <i class="bi bi-pencil-fill"></i>
                    </button>
                    <button type="button" class="btn btn-info operator-button-detail-info" data-bs-toggle="modal" data-id="{{ $operator->id }}" data-bs-target="#operator-modal-detail-info">
                      <i class="bi bi-info-circle"></i>
                    </button>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@include('operator_dataoperator.modal')
@include('operator_dataoperator.proses')
@endsection