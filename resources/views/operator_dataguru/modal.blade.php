{{-- Modal show detail --}}
<div class="modal fade" id="guru-modal-detail-info" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="card-title">Detail Guru</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="card" style="box-shadow: none">
        <div class="card-body pt-3">
          <div class="tab-pane fade show active profile-overview" id="profile-overview">

            <div class="row">
              <div class="col-lg-3 col-md-4 label" style="font-weight: 600; color: rgba(1, 41, 112, 0.6);">Nama Lengkap: </div>
              <div class="col-lg-9 col-md-8" id="guru-info-nama"></div>
            </div>

            <div class="row mt-3">
              <div class="col-lg-3 col-md-4 label" style="font-weight: 600; color: rgba(1, 41, 112, 0.6);">NIP: </div>
              <div class="col-lg-9 col-md-8" id="guru-info-nip"></div>
            </div>

            <div class="row mt-3">
              <div class="col-lg-3 col-md-4 label" style="font-weight: 600; color: rgba(1, 41, 112, 0.6);">Tempat Lahir: </div>
              <div class="col-lg-9 col-md-8" id="guru-info-tempat-lahir"></div>
            </div>

            <div class="row mt-3">
              <div class="col-lg-3 col-md-4 label" style="font-weight: 600; color: rgba(1, 41, 112, 0.6);">Tanggal Lahir: </div>
              <div class="col-lg-9 col-md-8" id="guru-info-tanggal-lahir"></div>
            </div>

            <div class="row mt-3">
              <div class="col-lg-3 col-md-4 label" style="font-weight: 600; color: rgba(1, 41, 112, 0.6);">Jenis Kelamin: </div>
              <div class="col-lg-9 col-md-8" id="guru-info-jenis-kelamin"></div>
            </div>
            <div class="row mt-3">
              <div class="col-lg-3 col-md-4 label" style="font-weight: 600; color: rgba(1, 41, 112, 0.6);">Nomor Telepon: </div>
              <div class="col-lg-9 col-md-8" id="guru-info-nomor-telepon"></div>
            </div>
            <div class="row mt-3">
              <div class="col-lg-3 col-md-4 label" style="font-weight: 600; color: rgba(1, 41, 112, 0.6);">Alamat: </div>
              <div class="col-lg-9 col-md-8" id="guru-info-alamat"></div>
            </div>
            <hr>
            <div class="row mt-3">
              <div class="col-lg-3 col-md-4 label" style="font-weight: 600; color: rgba(1, 41, 112, 0.6);">Mapel: </div>
              <div class="col-lg-9 col-md-8" id="guru-info-mapel"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- Modal show preview --}}
<div class="modal fade" id="guru-modal-image-preview" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="card-title">Preview Foto Guru</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="card" style="box-shadow: none">
        <img id="image-preview">
      </div>
    </div>
  </div>
</div>
