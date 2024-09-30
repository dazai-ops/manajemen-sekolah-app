@extends('layouts.main')

@section('content')
<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{route('dataguru.index')}}">Data Guru</a></li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<div class="section dashboard">
  <div class="row">
    <div class="card">
      <div class="card-body d-flex flex-column justify-content-center">
        <form action="{{ route('dataguru.store') }}" method="POST" id="guru-form-tambah" enctype="multipart/form-data" class="row g-4 mt-3">
          @csrf
          <div class="col-md-4">
            <label for="guru_nama" class="form-label" style="font-weight: bold">Nama Lengkap <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('guru_nama') is-invalid @enderror" id="guru_nama" name="guru_nama" value="{{ old('guru_nama') }}">
            @error('guru_nama')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="col-md-4">
            <label for="guru_nip" class="form-label" style="font-weight: bold">NIP <span class="text-danger">*</span></label>
            <input type="number" class="form-control @error('guru_nip') is-invalid @enderror" id="guru_nip" name="guru_nip" value="{{ old('guru_nip') }}">
            @error('guru_nip')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="col-md-4">
            <label for="guru_jenis_kelamin" class="form-label" style="font-weight: bold">Jenis Kelamin <span class="text-danger">*</span></label>
            <div>
              <select class="form-select @error('guru_jenis_kelamin') is-invalid @enderror" aria-label="Default select example" name="guru_jenis_kelamin" id="guru_jenis_kelamin">
                <option disabled {{ old('guru_jenis_kelamin') === null ? 'selected' : '' }}>Pilih opsi ini</option>
                <option value="1" {{ old('guru_jenis_kelamin') == '1' ? 'selected' : '' }}>Laki Laki</option>
                <option value="0" {{ old('guru_jenis_kelamin') == '0' ? 'selected' : '' }}>Perempuan</option>
              </select>
              @error('guru_jenis_kelamin')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="col-md-12">
            <label for="guru_nama" class="form-label" style="font-weight: bold">Mapel Yang Diampu <span class="text-danger">*</span></label>
            <div>
              <select class="selectpicker col-md-12 form-control @error('guru_mapel') is-invalid @enderror" name="guru_mapel[]" multiple aria-label="size 3 select example">
                @foreach ($dataMapel as $mapel)  
                  <option value="{{ $mapel->id }}" {{ (in_array($mapel->id, old('guru_mapel', []))) ? 'selected' : '' }}>
                    {{ $mapel->mapel_nama }}
                  </option>
                @endforeach
              </select>
              @error('guru_mapel')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="col-md-12">
            <label for="guru_alamat" class="form-label" style="font-weight: bold">Alamat Lengkap</label>
            <textarea name="guru_alamat" id="guru_alamat" class="form-control @error('guru_alamat') is-invalid @enderror" name="guru_alamat">{{ old('guru_alamat') }}</textarea>
            @error('guru_alamat')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="col-md-12">
            <label for="guru_nomor_telepon" class="form-label" style="font-weight: bold">Nomer Telepon Aktif <span class="text-danger">*</span></label>
            <input type="number" class="form-control @error('guru_nomor_telepon') is-invalid @enderror" id="guru_nomor_telepon" name="guru_nomor_telepon" value="{{ old('guru_nomor_telepon') }}">
            @error('guru_nomor_telepon')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="col-md-6">
            <label for="guru_tempat_lahir" class="form-label" style="font-weight: bold">Kota/Kab Kelahiran <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('guru_tempat_lahir') is-invalid @enderror" id="guru_tempat_lahir" name="guru_tempat_lahir" value="{{ old('guru_tempat_lahir') }}">
            @error('guru_tempat_lahir')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="col-md-6">
            <label for="guru_tanggal_lahir" class="form-label" style="font-weight: bold">Tanggal Lahir <span class="text-danger">*</span></label>
            <div>
              <input type="date" class="form-control @error('guru_tempat_lahir') is-invalid @enderror" id="guru_tanggal_lahir" name="guru_tanggal_lahir" value="{{ old('guru_tanggal_lahir') }}">
              @error('guru_tempat_lahir')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="col-md-12">
            <label for="guru-foto" class="form-label" style="font-weight: bold">Foto Guru</label>
            <input type="file" class="form-control @error('guru_foto') is-invalid @enderror" id="guru-foto" name="guru_foto" onchange="previewImage()">
            @error('guru_foto')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
            <button type="button" class="btn btn-primary mt-4" id="btn-preview-image" data-bs-toggle="modal" data-bs-target="#guru-modal-image-preview" style="display: none">Preview</button>
            <button type="button" class="btn btn-warning mt-4" id="btn-remove-preview-image" style="display: none" onclick="removePreviewImage()">Remove</button>
          </div>
          <div class="d-flex justify-content-end gap-2 mt-3">
            <button type="button" class="btn btn-secondary" onclick="window.history.back()">Kembali</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@include('operator_dataguru.modal')
@include('operator_dataguru.proses')
@endsection