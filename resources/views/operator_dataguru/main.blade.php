@extends('layouts.main')

@section('content')
<div class="pagetitle">
  <h1>Data Guru</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{ route('dataguru.index') }}">Data Guru</a></li>
    </ol>
  </nav>
</div>
<div class="section dashboard">
  <div class="row">
    <div class="col-lg-12">
  
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-start align-items-center mt-4 mb-3">
            <a href="{{ route('dataguru.create') }}" class="btn btn-outline-primary">
              <i class="bi bi-plus"></i>
              Tambah Guru
            </a>
          </div>
          <table id="initDataTable" class="table" style="width:100%">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>Mapel</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @php
                  $warnaMapel = [
                    1 => 'bg-primary',   // ID 1 -> Primary
                    2 => 'bg-success',   // ID 2 -> Success
                    3 => 'bg-danger',    // ID 3 -> Danger
                    4 => 'bg-warning',   // ID 4 -> Warning
                    5 => 'bg-info',      // ID 5 -> Info
                    6 => 'bg-dark',      // ID 6 -> Dark
                    7 => 'bg-secondary', // ID 7 -> Secondary
                    8 => 'bg-light',     // ID 8 -> Light
                    9 => 'bg-primary',   // ID 9 -> Primary
                    10 => 'bg-success',  // ID 10 -> Success
                    11 => 'bg-danger',   // ID 11 -> Danger
                    12 => 'bg-warning',  // ID 12 -> Warning
                    13 => 'bg-info'      // ID 13 -> Info
                  ]
              @endphp
              @foreach ($dataGuru as $guru)    
                <tr>
                  <td class="text-center">{{ $loop->iteration }}</td>
                  <td>
                    <img src="{{ asset($guru->guru_foto ? 'storage/foto_guru/' . $guru->guru_foto : 'img/profile.jpg') }}" alt="Guru" class="rounded-circle" style="width: 35px; height: 35px;"> 
                  </td>
                  <td class="align-middle">{{ $guru->guru_nama }}</td>
                  <td class="flex flex-column align-middle">
                    @foreach ($guru->mapel as $mapel)
                      @php
                        $warna = $warnaMapel[$mapel->id] ?? 'bg-primary';
                      @endphp
                      <span class="badge {{ $warna }}">{{ $mapel->mapel_nama }}</span>
                    @endforeach
                  </td>
                  <td class="d-flex gap-1 align-middle">
                    <a href="{{ route('dataguru.edit', $guru->id) }}" class="btn btn-warning">
                      <i class="bi bi-pencil-fill"></i>
                    </a>
                    <button type="button" class="btn btn-info guru-button-detail-info" data-bs-toggle="modal" data-bs-target="#guru-modal-detail-info" data-id={{ $guru->id }}>
                      <i class="bi bi-info-circle"></i>
                    </button>
                    <a href="{{ route('dataguru.destroy', $guru->id) }}" class="btn btn-danger" data-confirm-delete="true">
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
@include('operator_dataguru.modal')
@include('operator_dataguru.proses')
@endsection