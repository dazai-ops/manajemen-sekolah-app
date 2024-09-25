{{-- Modal change status --}}
<div class="modal fade" id="operator-modal-set-status" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="operator-modal-info-nama"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="operator-form-set-status" method="POST" >
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="operator-checkbox-set-status">
            <label class="form-check-label operator-status" for="operator-checkbox-set-status">Ubah Status Operator</label>
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

{{-- Modal show detail --}}
<div class="modal fade" id="operator-modal-detail-info" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="card-title">Detail Operator</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="card" style="box-shadow: none">
        <div class="card-body pt-3">
          <div class="tab-pane fade show active profile-overview" id="profile-overview">

            <div class="row">
              <div class="col-lg-3 col-md-4 label" style="font-weight: 600; color: rgba(1, 41, 112, 0.6);">Nama Lengkap: </div>
              <div class="col-lg-9 col-md-8" id="operator-info-nama"></div>
            </div>

            <div class="row mt-3">
              <div class="col-lg-3 col-md-4 label" style="font-weight: 600; color: rgba(1, 41, 112, 0.6);">Nama Lengkap: </div>
              <div class="col-lg-9 col-md-8" id="operator-info-jenis-kelamin"></div>
            </div>

            <div class="row mt-3">
              <div class="col-lg-3 col-md-4 label" style="font-weight: 600; color: rgba(1, 41, 112, 0.6);">Username: </div>
              <div class="col-lg-9 col-md-8" id="operator-info-username"></div>
            </div>

            <div class="row mt-3">
              <div class="col-lg-3 col-md-4 label" style="font-weight: 600; color: rgba(1, 41, 112, 0.6);">Email: </div>
              <div class="col-lg-9 col-md-8" id="operator-info-email"></div>
            </div>

            <div class="row mt-3">
              <div class="col-lg-3 col-md-4 label" style="font-weight: 600; color: rgba(1, 41, 112, 0.6);">Nomor Telepon: </div>
              <div class="col-lg-9 col-md-8" id="operator-info-telepon"></div>
            </div>

            <div class="row mt-3">
              <div class="col-lg-3 col-md-4 label" style="font-weight: 600; color: rgba(1, 41, 112, 0.6);">Alamat: </div>
              <div class="col-lg-9 col-md-8" id="operator-info-alamat"></div>
            </div>

            <div class="row mt-3">
              <div class="col-lg-3 col-md-4 label" style="font-weight: 600; color: rgba(1, 41, 112, 0.6);">Kode Operator: </div>
              <div class="col-lg-9 col-md-8" id="operator-info-kode"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
