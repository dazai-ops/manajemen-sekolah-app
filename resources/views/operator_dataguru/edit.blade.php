@extends('layouts.main')

@section('content')
<div class="pagetitle">
  <h1>Edit Data Guru</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('dataguru.index') }}">Home</a></li>
      <li class="breadcrumb-item active">Data Guru</li>
    </ol>
  </nav>
</div>

    <div class="card">
      <div class="card-body d-flex flex-column justify-content-center">
        <div class="image-profile d-flex justify-content-center flex-column align-items-center">
          <img src="{{ asset($detailGuru->guru_foto ? 'storage/foto_guru/'.$detailGuru->guru_foto : 'img/profile.jpg') }}" alt="" class="rounded-circle mt-4 cursor-pointer" style="width: 150px; height: 150px; margin:0 auto">
        </div>
        <form action="{{ route('dataguru.update', $detailGuru->id) }}" method="POST" enctype="multipart/form-data" class="row g-4 mt-3">
          @csrf
          @method('PUT')
          <input type="hidden" class="form-control" id="guru_nip_old" name="guru_nip_old" value="{{ $detailGuru->guru_nip }}">
          <input type="hidden" class="form-control" id="guru_foto_old" name="guru_foto_old" value="{{ $detailGuru->guru_foto }}">
          <input type="hidden" class="form-control" id="guru_nomor_telepon_old" name="guru_nomor_telepon_old" value="{{ $detailGuru->guru_nomor_telepon }}">
          <div class="col-md-4">
            <label for="guru_nama" class="form-label" style="font-weight: bold">Nama Lengkap</label>
            <input type="text" class="form-control @error('guru_nama') is-invalid @enderror" id="guru_nama" name="guru_nama" value="{{ old('guru_nama', $detailGuru->guru_nama) }}">
            @error('guru_nama')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="col-md-4">
            <label for="guru_nip" class="form-label" style="font-weight: bold">NIP</label>
            <input type="number" class="form-control @error('guru_nip') is-invalid @enderror" id="guru_nip" name="guru_nip" value="{{ old('guru_nip', $detailGuru->guru_nip) }}">
            @error('guru_nip')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="col-md-4">
            <label for="guru_jenis_kelamin" class="form-label" style="font-weight: bold">Jenis Kelamin</label>
            <div>
              <select class="form-select" aria-label="Default select example" name="guru_jenis_kelamin" id="guru_jenis_kelamin">
                <option selected disabled>Pilih opsi ini</option>
                <option value="1" @if(old('guru_jenis_kelamin', $detailGuru->guru_jenis_kelamin == 1)) selected @endif>Laki Laki</option>
                <option value="0" @if(old('guru_jenis_kelamin', $detailGuru->guru_jenis_kelamin == 0)) selected @endif>Perempuan</option>
              </select>
            </div>
          </div>
          <div class="col-md-12">
            <label for="guru_nama" class="form-label" style="font-weight: bold">Mapel Yang Diampu</label>
            <div>
              <select class="selectpicker col-md-12 form-control @error('guru_mapel') is-invalid @enderror" name="guru_mapel[] " multiple aria-label="size 3 select example">
                @foreach ($dataMapel as $mapel)  
                  <option value="{{ $mapel->id }}" @if(in_array($mapel->id, old('guru_mapel', $mapelGuru->pluck('id')->toArray()))) selected @endif>
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
            <textarea name="guru_alamat" id="guru_alamat" class="form-control @error('guru_alamat') is-invalid @enderror" name="guru_alamat">{{ old('guru_alamat', $detailGuru->guru_alamat) }}</textarea>
            @error('guru_alamat')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="col-md-12">
            <label for="guru_nomor_telepon" class="form-label" style="font-weight: bold">Nomor Telepon Aktif</label>
            <input type="number" class="form-control @error('guru_nomor_telepon') is-invalid @enderror" id="guru_nomor_telepon" name="guru_nomor_telepon" value="{{ old('guru_nomor_telepon', $detailGuru->guru_nomor_telepon) }}">
            @error('guru_nomor_telepon')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="col-md-6">
            <label for="guru_tempat_lahir" class="form-label" style="font-weight: bold">Kota/Kab Kelahiran</label>
            <input type="text" class="form-control @error('guru_tempat_lahir') is-invalid @enderror" id="guru_tempat_lahir" name="guru_tempat_lahir" value="{{ old('guru_tempat_lahir', $detailGuru->guru_tempat_lahir) }}">
            @error('guru_tempat_lahir')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="col-md-6">
            <label for="guru_tanggal_lahir" class="form-label" style="font-weight: bold">Tanggal Lahir</label>
            <div>
              <input type="date" class="form-control @error('guru_tempat_lahir') is-invalid @enderror" id="guru_tanggal_lahir" name="guru_tanggal_lahir" value="{{ old('guru_tanggal_lahir', $detailGuru->guru_tanggal_lahir) }}">
              @error('guru_tempat_lahir')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="col-md-12">
            <label for="guru_foto" class="form-label" style="font-weight: bold">Foto Guru</label>
            <input type="file" class="form-control @error('guru_foto') is-invalid @enderror" id="guru_foto" name="guru_foto" onchange="previewImage()">
            @error('guru_foto')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
            <button type="button" class="btn btn-primary mt-4" id="btn-preview-image" data-bs-toggle="modal" data-bs-target="#guru-modal-image-preview" style="display: none">Preview</button>
            <button type="button" class="btn btn-warning mt-4" id="remove-preview-image" style="display: none" onclick="removePreviewImage()">Remove</button>
          </div>
          <div class="d-flex justify-content-end gap-2 mt-3">
            <a href="{{ route('dataguru.index') }}" class="btn btn-secondary" type="button">Kembali</a>
            {{-- <button type="button" class="btn btn-secondary">Kembali</button> --}}
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