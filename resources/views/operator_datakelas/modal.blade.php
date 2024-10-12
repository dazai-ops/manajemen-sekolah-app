{{-- Tambah data kelas --}}
<div class="modal fade" id="kelas-modal-tambah" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Kelas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="kelas-form-tambah" method="POST">
        @method('POST')
        @csrf
        <div class="col-md-12 p-2">
          <label for="kelas-nama-tambah" class="form-label">Nama Kelas<span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="kelas-nama-tambah" name="kelas_nama_tambah">
        </div>
        <div class="col-md-12 p-2">
          <label for="nama-guru-tambah" class="form-label">Nama Wali Kelas<span class="text-danger">*</span></label>
          <div>
            <select class="form-select" aria-label="Default select example" name="nama_guru_tambah" id="nama-guru-tambah">
              <option selected disabled>Pilih opsi ini</option>
              @foreach ($dataGuru as $guru)
                  <option value="{{ $guru->id }}" >{{$guru->guru_nama}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-md-12 p-2">
          <label for="kelas-fasilitas-tambah" class="form-label">Fasilitas Kelas<span class="text-danger">*</span></label>
          <div>
            <select class="selectpicker col-md-12 form-control" name="kelas_fasilitas_tambah[]" multiple aria-label="size 3 select example">
              @foreach ($dataFasilitasKelas as $fasilitas)  
                <option value="{{ $fasilitas->id }}">
                  {{ $fasilitas->fasilitas_nama }}
                </option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- Edit data kelas --}}
<div class="modal fade" id="kelas-modal-edit" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Kelas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="kelas-form-edit" method="POST">
        @method('PUT')
        @csrf
        <div class="col-md-12 p-2">
          <label for="kelas-nama-edit" class="form-label">Nama Kelas<span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="kelas-nama-edit" name="kelas_nama_edit">
        </div>
        <div class="col-md-12 p-2">
          <label for="nama-guru-edit" class="form-label">Nama Wali Kelas<span class="text-danger">*</span></label>
          <div>
            <select class="form-select" aria-label="Default select example" name="nama_guru_edit" id="nama-guru-edit">
              <option selected disabled>Pilih opsi ini</option>
              @foreach ($dataGuru as $guru)
                  <option value="{{ $guru->id }}" >{{$guru->guru_nama}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-md-12 p-2">
          <label for="kelas-fasilitas-edit" class="form-label">Fasilitas Kelas<span class="text-danger">*</span></label>
          <div>
            <select class="selectpicker col-md-12 form-control" name="kelas_fasilitas_edit[]" multiple aria-label="size 3 select example" id="kelas-fasilitas-edit">
              @foreach ($dataFasilitasKelas as $fasilitas)  
                <option value="{{ $fasilitas->id }}">
                  {{ $fasilitas->fasilitas_nama }}
                </option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- Modal for show detail --}}
<div class="modal fade" id="kelas-modal-detail-info" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="card-title">Detail Kelas</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="card" style="box-shadow: none">
        <div class="card-body pt-3">
          <div class="tab-pane fade show active profile-overview" id="profile-overview">

            <div class="row">
              <div class="col-lg-3 col-md-4 label" style="font-weight: 600; color: rgba(1, 41, 112, 0.6);">Nama Kelas: </div>
              <div class="col-lg-9 col-md-8" id="kelas-info-nama"></div>
            </div>

            <div class="row mt-3">
              <div class="col-lg-3 col-md-4 label" style="font-weight: 600; color: rgba(1, 41, 112, 0.6);">Wali Kelas: </div>
              <div class="col-lg-9 col-md-8" id="kelas-info-wali-kelas"></div>
            </div>

            <div class="row mt-3">
              <div class="col-lg-3 col-md-4 label" style="font-weight: 600; color: rgba(1, 41, 112, 0.6);">Fasilitas: </div>
              <div class="col-lg-9 col-md-8" id="kelas-info-fasilitas"></div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>