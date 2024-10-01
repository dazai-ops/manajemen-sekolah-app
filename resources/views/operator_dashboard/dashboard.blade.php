@extends('layouts.main')
@section('content')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div>
<div class="section dashboard">
    <div class="row">
        <div class="col-12">
            <div class="card info-card revenue-card">
                <div class="card-body">
                <h5 class="card-title">Total Operator</h5>
                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-person-circle"></i>
                    </div>
                    <div class="ps-3">
                        <h6>{{ $operatorAktif }} Operator Aktif</h6>
                        <span class="text-warning small pt-1 fw-bold">{{ $operatorTidakAktif }}</span> <span class="text-muted small pt-2 ps-1">tidak aktif</span>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card info-card revenue-card">
                <div class="card-body">
                <h5 class="card-title">Total Guru Terdaftar</h5>
                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-person-video3"></i>
                    </div>
                    <div class="ps-3">
                        <h6>{{ $guruTerdaftar }} Guru</h6>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card info-card revenue-card">
                <div class="card-body">
                <h5 class="card-title">Total Siswa Terdaftar</h5>
                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <div class="ps-3">
                        <h6>{{ $siswaTerdaftar }} Siswa</h6>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection