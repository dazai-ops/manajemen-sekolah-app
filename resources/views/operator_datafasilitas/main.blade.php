@extends('layouts.main')

@section('content')
<div class="pagetitle">
  <h1>Data Fasilitas Kelas</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{ route('fasilitas.index') }}">Data Fasilitas Kelas</a></li>
    </ol>
  </nav>
</div>
<div class="section dashboard">
  <div class="row">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-start align-items-center mt-4 mb-3">
              <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#fasilitas-modal-tambah">
                <i class="bi bi-plus"></i>
                Tambah Fasilitas
              </button>
            </div>
            <table id="initDataTable" class="table" style="width:100%">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th>Nama</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($dataFasilitasKelas as $fasilitas)    
                  <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $fasilitas->fasilitas_nama }}</td>
                    <td class="d-flex gap-1 justify-content-center">
                      <button type="button" class="btn btn-warning fasilitas-button-edit" id="fasilitas-button-edit" data-bs-toggle="modal" data-bs-target="#fasilitas-modal-edit" data-id="{{ $fasilitas->id }}">
                        <i class="bi bi-pencil-fill"></i>
                      </button>
                      <a href="{{ route('fasilitas.destroy', $fasilitas->id) }}" class="btn btn-danger" data-confirm-delete="true">
                        <i class="bi bi-trash-fill"></i>
                      </a>
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
@include('operator_datafasilitas.modal')
@include('operator_datafasilitas.proses')
@endsection