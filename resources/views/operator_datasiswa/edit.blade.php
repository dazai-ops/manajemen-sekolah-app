@extends('layouts.main')

@section('content')
{{-- {{$dataKelas}} --}}
<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<div class="section dashboard">
  <div class="row">
    <div class="card">
        <div class="card-body d-flex flex-column justify-content-center">

            <div class="image-profile d-flex justify-content-center flex-column align-items-center">
            <img src="{{ asset($dataSiswa->siswa_foto ? 'storage/foto_siswa/'.$dataSiswa->siswa_foto : 'img/profile.jpg') }}" alt="" class="rounded-circle mt-4 cursor-pointer" style="width: 150px; height: 150px; margin:0 auto">
          </div>
            <form action="{{ route('datasiswa.update', $dataSiswa->id) }}" method="POST" enctype="multipart/form-data" class="row g-4 mt-3">
            @csrf
            @method('PUT')
            <input type="hidden" class="form-control" id="siswa_nisn_old" name="siswa_nisn_old" value="{{ $dataSiswa->siswa_nisn }}">
            <div class="col-md-4">
                <label for="siswa_nama" class="form-label" style="font-weight: bold">Nama Lengkap <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('siswa_nama') is-invalid @enderror" id="siswa_nama" name="siswa_nama" value="{{ old('siswa_nama', $dataSiswa->siswa_nama) }}">
                @error('siswa_nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="siswa_nisn" class="form-label" style="font-weight: bold">NISN <span class="text-danger">*</span></label>
                <input type="number" class="form-control @error('siswa_nisn') is-invalid @enderror" id="siswa_nisn" name="siswa_nisn" value="{{ old('siswa_nisn', $dataSiswa->siswa_nisn) }}">
                @error('siswa_nisn')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="siswa_jenis_kelamin" class="form-label" style="font-weight: bold">Jenis Kelamin <span class="text-danger">*</span></label>
                <div>
                <select class="form-select @error('siswa_jenis_kelamin') is-invalid @enderror" aria-label="Default select example" name="siswa_jenis_kelamin" id="siswa_jenis_kelamin">
                    <option disabled {{ old('siswa_jenis_kelamin') === null ? 'selected' : '' }}>Pilih opsi ini</option>
                    <option value="1" {{ old('siswa_jenis_kelamin', $dataSiswa->siswa_jenis_kelamin ) == '1' ? 'selected' : '' }}>Laki Laki</option>
                    <option value="0" {{ old('siswa_jenis_kelamin', $dataSiswa->siswa_jenis_kelamin ) == '0' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('siswa_jenis_kelamin')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                @enderror
                </div>
            </div>

            <div class="col-md-12">
                <label for="siswa_alamat" class="form-label" style="font-weight: bold">Alamat Lengkap</label>
                <textarea name="siswa_alamat" id="siswa_alamat" class="form-control @error('siswa_alamat') is-invalid @enderror" name="siswa_alamat">{{ old('siswa_alamat', $dataSiswa->siswa_alamat) }}</textarea>
                @error('siswa_alamat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="siswa_nomor_telepon" class="form-label" style="font-weight: bold">Nomer Telepon Aktif <span class="text-danger">*</span></label>
                <input type="number" class="form-control @error('siswa_nomor_telepon') is-invalid @enderror" id="siswa_nomor_telepon" name="siswa_nomor_telepon" value="{{ old('siswa_nomor_telepon', $dataSiswa->siswa_nomor_telepon) }}">
                @error('siswa_nomor_telepon')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="siswa_kelas" class="form-label" style="font-weight: bold">Kelas <span class="text-danger">*</span></label>
                <div>
                <select class="form-select @error('siswa_kelas') is-invalid @enderror" aria-label="Default select example" name="siswa_kelas" id="siswa_kelas">
                    <option disabled {{ old('siswa_kelas') === null ? 'selected' : '' }}>Pilih opsi ini</option>
                    @foreach ($dataKelas as $kelas)
                        <option value="{{ $kelas->id }}" @if ($kelas->id == $dataSiswa->siswa_kelas_id)selected @endif>{{ $kelas->kelas_nama }}</option>
                    @endforeach
                </select>
                @error('siswa_kelas')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                @enderror
                </div>
            </div>

            <div class="col-md-6">
                <label for="siswa_tempat_lahir" class="form-label" style="font-weight: bold">Kota/Kab Kelahiran <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('siswa_tempat_lahir') is-invalid @enderror" id="siswa_tempat_lahir" name="siswa_tempat_lahir" value="{{ old('siswa_tempat_lahir', $dataSiswa->siswa_tempat_lahir) }}">
                @error('siswa_tempat_lahir')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="siswa_tanggal_lahir" class="form-label" style="font-weight: bold">Tanggal Lahir <span class="text-danger">*</span></label>
                <div>
                <input type="date" class="form-control @error('siswa_tempat_lahir') is-invalid @enderror" id="siswa_tanggal_lahir" name="siswa_tanggal_lahir" value="{{ old('siswa_tanggal_lahir', $dataSiswa->siswa_tanggal_lahir) }}">
                @error('siswa_tempat_lahir')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                @enderror
                </div>
            </div>
            <div class="col-md-12">
                <label for="siswa_foto" class="form-label" style="font-weight: bold">Foto Siswa</label>
                <input type="file" class="form-control @error('siswa_foto') is-invalid @enderror" id="siswa-foto" name="siswa_foto" onchange="previewImage()">
                @error('siswa_foto')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <button type="button" class="btn btn-primary mt-4" id="siswa-btn-preview-foto" data-bs-toggle="modal" data-bs-target="#siswa-modal-preview-foto" style="display: none">Preview</button>
                <button type="button" class="btn btn-warning mt-4" id="siswa-btn-remove-preview-foto" style="display: none" onclick="removePreviewImage()">Remove</button>
            </div>
            <div class="d-flex justify-content-end gap-2 mt-3">
                <a href="{{route('datasiswa.index')}}" class="btn btn-secondary">
                    Kembali
                </a>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
  </div>
</div>
@include('operator_datasiswa.modal')
@include('operator_datasiswa.proses')
@endsection