@extends('layouts.main')

@section('content')
<div class="pagetitle">
  <h1>Dashboard</h1>
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
    <div class="d-flex justify-content-between">
      <h1>Jadwal untuk kelas: {{$kelas->kelas_nama}}</h1>
      <a href="{{route('jadwal-pelajaran.edit', $kelas->id)}}" class="btn btn-warning my-auto">
        <i class="bi bi-pencil-fill"></i>
        Edit Jadwal
      </a>
    </div>
      <hr>
      
      @php
          $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
      @endphp

      @foreach($days as $day)
          <h3>{{ $day }}</h3>
          <table class="table table-bordered mt-2">
              <thead>
                  <tr>
                      <th style="width: 25%">Mata Pelajaran</th>
                      <th style="width: 25%">Guru</th>
                      <th style="width: 25%">Jam Mulai</th>
                      <th style="width: 25%">Jam Selesai</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($jadwal as $item)
                      @if($item->hari === $day)
                          <tr>
                              <td>{{ $item->mapel->mapel_nama }}</td>
                              <td>{{ $item->guru->guru_nama }}</td>
                              <td>{{ $item->jam_mulai }}</td>
                              <td>{{ $item->jam_selesai }}</td>
                          </tr>
                      @endif
                  @endforeach
              </tbody>
          </table>
        @endforeach
    </div>

  </div>
</div>
@endsection