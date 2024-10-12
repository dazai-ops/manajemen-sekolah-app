@extends('layouts.main')

@section('content')
<div class="pagetitle">
  <h1>Data Kelas</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{ route('datakelas.index') }}">Data Kelas</a></li>
    </ol>
  </nav>
</div>
<div class="section dashboard">
  <div class="row">
    <div class="col-lg-12">
  
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mt-4 mb-3">
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#kelas-modal-tambah">
              <i class="bi bi-plus"></i>
              Tambah Kelas
            </button>
            <h1></h1>
          </div>
          <table id="initDataTable" class="table" style="width:100%">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th>Kelas</th>
                <th>Nama Wali</th>
                <th>Fasilitas Kelas</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($dataKelas as $kelas)    
                <tr>
                  <td class="text-center">{{ $loop->iteration }}</td>
                  <td class="align-middle">{{ $kelas->kelas_nama }}</td>
                  <td class="align-middle">{{ $kelas->wali_kelas->guru_nama }}</td>
                  <td class="align-middle">
                    {{ $kelas->fasilitas->pluck('fasilitas_nama')->implode(', ') }}
                  </td>
                  <td class="d-flex gap-1 align-middle">
                    <button type="button" class="btn btn-warning kelas-button-edit" data-bs-toggle="modal" data-bs-target="#kelas-modal-edit" data-id={{ $kelas->id }}>
                      <i class="bi bi-pencil-fill"></i>
                    </button>
                    <button type="button" class="btn btn-info kelas-button-detail-info" data-bs-toggle="modal" data-bs-target="#kelas-modal-detail-info" data-id={{ $kelas->id }}>
                      <i class="bi bi-info-circle"></i>
                    </button>
                    <a href="{{ route('datakelas.destroy', $kelas->id) }}" class="btn btn-danger" data-confirm-delete="true">
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
@include('operator_datakelas.modal')
@include('operator_datakelas.proses')
@endsection