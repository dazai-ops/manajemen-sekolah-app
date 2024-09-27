@extends('layouts.main')

@section('content')
<div class="pagetitle">
  <h1>Data Siswa</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{ route('datasiswa.index') }}">Data Siswa</a></li>
    </ol>
  </nav>
</div>
<div class="section dashboard">
  <div class="row">
    <div class="col-lg-12">
  
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mt-4 mb-3">
            <a href="{{ route('datasiswa.create') }}" class="btn btn-outline-primary">
              <i class="bi bi-plus"></i>
              Tambah Siswa
            </a>
            <h1></h1>
          </div>
          <table id="initDataTable" class="table" style="width:100%">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jenis Kelamin</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($dataSiswa as $siswa)    
                <tr>
                  <td class="text-center">{{ $loop->iteration }}</td>
                  <td>
                    <img src="{{ asset($siswa->siswa_foto ? 'storage/foto_siswa/' . $siswa->siswa_foto : 'img/profile.jpg') }}" alt="Guru" class="rounded-circle" style="width: 35px; height: 35px;"> 
                  </td>
                  <td class="align-middle">{{ $siswa->siswa_nama }}</td>
                  <td class="align-middle">{{ $siswa->kelas->kelas_nama }}</td>
                  <td class="align-middle">{{ $siswa->siswa_jenis_kelamin }}</td>
                  <td class="d-flex gap-1 align-middle">
                    <a href="{{ route('datasiswa.edit', $siswa->id) }}" class="btn btn-warning">
                      <i class="bi bi-pencil-fill"></i>
                    </a>
                    <button type="button" class="btn btn-info siswa-button-detail-info" data-bs-toggle="modal" data-bs-target="#siswa-modal-detail-info" data-id={{ $siswa->id }}>
                      <i class="bi bi-info-circle"></i>
                    </button>
                    <a href="{{ route('datasiswa.destroy', $siswa->id) }}" class="btn btn-danger" data-confirm-delete="true">
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
@include('operator_datasiswa.modal')
@include('operator_datasiswa.proses')
@endsection