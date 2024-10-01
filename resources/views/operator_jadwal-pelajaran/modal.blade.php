{{-- Modal tambah jadwal list --}}
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
          <label for="mata-pelajaran" class="form-label">Mata Pelajaran<span class="text-danger">*</span></label>
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
          <label for="guru-pengajar" class="form-label">Guru Pengajar<span class="text-danger">*</span></label>
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
          <label for="jam-mulai" class="form-label">Jam Mulai<span class="text-danger">*</span></label>
          <input type="time" class="form-control" id="jam-mulai" name="jam_mulai">
          @error('jam-mulai')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="col-md-12 p-2">
          <label for="jam-selesai" class="form-label">Jam Selesai<span class="text-danger">*</span></label>
          <input type="time" class="form-control" id="jam-selesai" name="jam_selesai">
          @error('jam-selesai')
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

{{-- Modal edit jadwal list --}}
<div class="modal fade" id="jadwal-list-modal-tambah" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Jadwal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="jadwal-list-form-tambah" method="POST">
        @csrf
        <input type="hidden" class="form-control" id="hari">
        <input type="hidden" class="form-control" id="kelas-id">
        <div class="col-md-12 p-2">
          <label for="mata-pelajaran-tambah" class="form-label">Mata Pelajaran<span class="text-danger">*</span></label>
          <div>
            <select class="form-select" aria-label="Default select example" name="mata-pelajaran-tambah" id="mata-pelajaran-tambah">
              <option selected disabled>Pilih opsi ini</option>
              @foreach ($dataMapel as $mapel)
                  <option value="{{ $mapel->id }}" >{{$mapel->mapel_nama}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-md-12 p-2">
          <label for="guru-pengajar-tambah" class="form-label">Guru Pengajar<span class="text-danger">*</span></label>
          <div>
            <select class="form-select" aria-label="Default select example" name="guru_pengajar_tambah" id="guru-pengajar-tambah">
              <option selected disabled>Pilih opsi ini</option>
              @foreach ($dataGuru as $guru)
                  <option value="{{ $guru->id }}">{{$guru->guru_nama}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-md-12 p-2">
          <label for="jam-mulai-tambah" class="form-label">Jam Mulai<span class="text-danger">*</span></label>
          <input type="time" class="form-control" id="jam-mulai-tambah" name="jam_mulai_tambah">
        </div>
        <div class="col-md-12 p-2">
          <label for="jam-selesai-tambah" class="form-label">Jam Selesai<span class="text-danger">*</span></label>
          <input type="time" class="form-control" id="jam-selesai-tambah" name="jam_selesai_tambah">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>