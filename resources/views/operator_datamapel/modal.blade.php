{{-- Modal edit mapel --}}
<div class="modal fade" id="mapel-modal-edit" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Mata Pelajaran</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="mapel-form-edit" method="POST" >
        @csrf
        @method('PUT')
        <div class="col-md-12 p-2">
          <input type="text" class="form-control" id="mapel-field-input-nama" name="mapel_nama">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- Modal tambah mapel --}}
<div class="modal fade" id="mapel-modal-tambah" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Mata Pelajaran</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="mapel-form-tambah" method="POST" >
        @csrf
        <div class="col-md-12 p-2">
          <input type="text" class="form-control" id="mapel-field-input-nama-baru" name="mapel_nama_baru">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>