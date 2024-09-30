@extends('layouts.main')

@section('content')
<div class="pagetitle">
  <h1>Data Mapel</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{ route('datamapel.index') }}">Data Mapel</a></li>
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
              <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#mapel-modal-tambah">
                <i class="bi bi-plus"></i>
                Tambah Mapel
              </button>
            </div>
            <table id="initDataTable" class="table" style="width:100%">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">Nama</th>
                  <th class="text-center">Jumlah Guru</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($dataMapel as $mapel)    
                  <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $mapel->mapel_nama }}</td>
                    <td class="text-center">
                      <span class="badge bg-info text-dark">{{ $mapel->guru_count }}</span>
                    </td>
                    <td class="d-flex gap-1 justify-content-center">
                      <button type="button" class="btn btn-warning mapel-button-edit" id="mapel-button-edit" data-bs-toggle="modal" data-bs-target="#mapel-modal-edit" data-id="{{ $mapel->id }}">
                        <i class="bi bi-pencil-fill"></i>
                      </button>
                      <a href="{{ route('datamapel.destroy', $mapel->id) }}" class="btn btn-danger" data-confirm-delete="true">
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
@include('operator_datamapel.modal')
@include('operator_datamapel.proses')
@endsection