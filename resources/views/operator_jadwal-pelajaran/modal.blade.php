{{-- Modal tambah mapel --}}
<div class="modal fade" id="jadwal-list-modal-edit" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Jadwal</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="jadwal-list-form-edit" method="POST" >
          @csrf
          @method('PUT')
          <div class="col-md-12 p-2">
            <label for="mata-pelajaran" class="form-label">Mata Pelajaran</label>
            <div>
              <select class="form-select" aria-label="Default select example" name="mata-pelajaran" id="mata-pelajaran">
                <option selected disabled>Pilih opsi ini</option>
                @foreach ($dataMapel as $mapel)
                    <option value="{{ $mapel->id }}" >{{$mapel->mapel_nama}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-12 p-2">
            <label for="guru-pengajar" class="form-label">Guru Pengajar</label>
            <div>
              <select class="form-select" aria-label="Default select example" name="guru-pengajar" id="guru-pengajar">
                <option selected disabled>Pilih opsi ini</option>
                @foreach ($dataGuru as $guru)
                    <option value="{{ $guru->id }}">{{$guru->guru_nama}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-12 p-2">
            <label for="guru_nama" class="form-label">Jam Mulai<span class="text-danger">*</span></label>
            <input type="time" class="form-control @error('guru_nama') is-invalid @enderror" id="jam-mulai" name="jam_mulai" value="{{ old('guru_nama') }}">
            @error('guru_nama')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="col-md-12 p-2">
            <label for="guru_nama" class="form-label">Jam Selesai<span class="text-danger">*</span></label>
            <input type="time" class="form-control @error('guru_nama') is-invalid @enderror" id="jam-selesai" name="jam_selesai" value="{{ old('guru_nama') }}">
            @error('guru_nama')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>