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
      <a href="{{route('jadwal-pelajaran.index')}}" class="btn btn-info my-auto">
        <i class="bi bi-bar-chart-line"></i>
        Lihat Jadwal Lain
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
                      <th style="width: 20%">Jam Mulai</th>
                      <th style="width: 20%">Jam Selesai</th>
                      <th style="width: 10%">Action</th>
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
                              <td class="d-flex gap-1 align-middle">
                                <button type="button" class="btn btn-warning jadwal-list-button-edit" data-bs-toggle="modal" data-bs-target="#jadwal-list-modal-edit" data-id="{{ $item->id }}">
                                  <i class="bi bi-pencil-fill"></i>
                                </button>
                                <form action="{{route('jadwal-pelajaran.destroy', $item->id)}}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <input type="hidden" name="kelas_id" value="{{$kelas->id}}">
                                  <button type="submit" class="btn btn-danger" data-confirm-delete="true">
                                    <i class="bi bi-trash-fill"></i>
                                  </button>
                                </form>
                              </td>
                          </tr>
                      @endif
                  @endforeach
              </tbody>
          </table>
        @endforeach
    </div>
  </div>
</div>
@include('operator_jadwal-pelajaran.modal')
@include('operator_jadwal-pelajaran.proses')
@endsection