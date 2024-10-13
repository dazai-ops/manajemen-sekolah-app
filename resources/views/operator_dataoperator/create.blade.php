@extends('layouts.main')

@section('content')
<div class="pagetitle">
  <h1>Tambah Operator</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item active"><a href="{{ route('dataoperator.index') }}">Data Operator</a></li>
      <li class="breadcrumb-item"><a href="{{ route('dataoperator.create') }}">Create</a></li>
    </ol>
  </nav>
</div>
<div class="section dashboard">
  <div class="row">
    <div class="card">
      <div class="card-body">
        <form action="{{ route('dataoperator.store') }}" method="POST" id="operator-form-tambah" class="row g-3 mt-4">
          @csrf
          <div class="col-md-4">
            <label for="operator-nama" class="form-label" style="font-weight: bold">Nama Lengkap</label>
            <input type="text" class="form-control @error('operator_nama') is-invalid @enderror" id="operator-nama" name="operator_nama" value="{{ old('operator_nama') }}">
            @error('operator_nama')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="col-md-4">
            <label for="operator-username" class="form-label" style="font-weight: bold">Username</label>
            <input type="text" class="form-control @error('operator_username') is-invalid @enderror" id="operator-username" name="operator_username" value="{{ old('operator_username') }}">
            @error('operator_username')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="col-md-4">
            <label for="operator-jenis-kelamin" class="form-label" style="font-weight: bold">Jenis Kelamin <span class="text-danger">*</span></label>
            <div>
              <select class="form-select @error('operator_jenis_kelamin') is-invalid @enderror" aria-label="Default select example" name="operator_jenis_kelamin" id="operator-jenis-kelamin">
                <option disabled {{ old('operator_jenis_kelamin') === null ? 'selected' : '' }}>Pilih opsi ini</option>
                <option value="1" {{ old('operator_jenis_kelamin') == '1' ? 'selected' : '' }}>Laki Laki</option>
                <option value="0" {{ old('operator_jenis_kelamin') == '0' ? 'selected' : '' }}>Perempuan</option>
              </select>
              @error('operator_jenis_kelamin')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="col-md-12">
            <label for="operator-alamat" style="font-weight: bold">Alamat Lengkap</label>
            <textarea name="operator_alamat" id="operator_alamat" class="form-control @error('operator_alamat') is-invalid @enderror" name="operator_alamat">{{ old('operator_alamat') }}</textarea>
            @error('operator_alamat')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="col-md-6">
            <label for="operator-nomor-telepon" class="form-label" style="font-weight: bold">Nomer Telepon Aktif</label>
            <input type="number" class="form-control @error('operator_nomor_telepon') is-invalid @enderror" id="operator-nomor-telepon" name="operator_nomor_telepon" value="{{ old('operator_nomor_telepon') }}">
            @error('operator_nomor_telepon')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="col-md-6">
            <label for="operator-email" class="form-label" style="font-weight: bold">Email Aktif</label>
            <input type="email" class="form-control @error('operator_email') is-invalid @enderror" id="operator-email" name="operator_email" value="{{ old('operator_email') }}">
            @error('operator_email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="col-md-6">
            <label for="operator-password" class="form-label" style="font-weight: bold">Password</label>
            <input type="password" class="form-control @error('operator_password') is-invalid @enderror" id="operator-password" name="operator_password">
            @error('operator_password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="col-md-6">
            <label for="operator-confirm-password" class="form-label" style="font-weight: bold">Confirm Password</label>
            <input type="password" class="form-control @error('operator_confirm_password') is-invalid @enderror" id="operator-confirm-password" name="operator_confirm_password">
            @error('operator_confirm_password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="d-flex justify-content-end gap-2 mt-3">
            <a href="{{ route('dataoperator.index') }}" class="btn btn-secondary"> Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@include('operator_dataoperator.proses')
@endsection