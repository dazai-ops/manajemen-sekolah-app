@extends('layouts.main')

@section('content')
<div class="pagetitle">
  <h1>Jadwal Pelajaran</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ route('jadwal-pelajaran.index') }}">Jadwal Pelajaran</a></li>
    </ol>
  </nav>
</div><!-- End Page Title -->
{{-- {{$jadwal}} --}}
<div class="section dashboard">
  <div class="row">
    <div class="col-md-12">
        <label for="guru_jenis_kelamin" class="form-label" style="font-weight: bold">Pilih kelas untuk melihat jadwal pelajaran<span class="text-danger">*</span></label>
        <div>
          <select class="form-select" aria-label="Default select example" name="select-jadwal-pelajaran" id="jadwal-pelajaran-select" onchange="showJadwal()">
            <option disabled selected>Pilih opsi ini</option>
            @foreach ($dataKelas as $item)
              <option value="{{$item->id}}">{{$item->kelas_nama}}</option>
            @endforeach
          </select>
        </div>
      </div>
  </div>
</div>
@include('operator_jadwal-pelajaran.proses')
@endsection