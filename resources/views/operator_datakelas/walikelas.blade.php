@extends('layouts.main')

@section('content')
<div class="pagetitle">
  <h1>Data Wali Kelas</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{ route('walikelas') }}">Wali Kelas</a></li>
    </ol>
  </nav>
</div>
<div class="section dashboard">
  <div class="row">
    <div class="col-lg-12">
  
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mt-4 mb-3">
            <h5>Berikut adalah daftar nama wali dari setiap kelas</h5>
          </div>
          <table id="initDataTable" class="table" style="width:100%">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th>Nama Wali Kelas</th>
                <th>Wali dari Kelas</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($waliKelas as $wali)    
                <tr>
                  <td class="text-center">{{ $loop->iteration }}</td>
                  <td class="align-middle">{{ $wali->guru_nama }}</td>
                  <td class="align-middle">
                    @foreach ($wali->kelas as $kelas)
                        <span class="badge {{ $loop->first ? 'bg-info' : 'bg-success' }} me-1">{{ $kelas->kelas_nama }}</span>
                    @endforeach
                </td>                
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>
@endsection