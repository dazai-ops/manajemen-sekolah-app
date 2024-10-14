{{-- Modal edit fasilitas --}}
<div class="modal fade" id="fasilitas-modal-edit" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Fasilitas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="fasilitas-form-edit" method="POST">
        @csrf
        @method('PUT')
        <div class="col-md-12 p-2">
          <input type="text" class="form-control" id="fasilitas-field-input-nama" name="fasilitas_nama">
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
<div class="modal fade" id="fasilitas-modal-tambah" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Fasilitas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="fasilitas-form-tambah" method="POST">
        @csrf
        <div class="col-md-12 p-2">
          <input type="text" class="form-control" id="fasilitas-field-input-nama-baru" name="fasilitas_nama_baru">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>