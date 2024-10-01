{{-- Modal preview foto --}}
<div class="modal fade" id="siswa-modal-preview-foto" tabindex="-1">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="card-title">Preview Foto Siswa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="card" style="box-shadow: none">
        <img id="siswa-foto-preview">
      </div>
    </div>
  </div>
</div>

{{-- Modal for show detail --}}
<div class="modal fade" id="siswa-modal-detail-info" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="card-title">Detail Siswa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="card" style="box-shadow: none">
        <div class="card-body pt-3">
          <div class="tab-pane fade show active profile-overview" id="profile-overview">

            <div class="row">
              <div class="col-lg-3 col-md-4 label" style="font-weight: 600; color: rgba(1, 41, 112, 0.6);">Nama Lengkap: </div>
              <div class="col-lg-9 col-md-8" id="siswa-info-nama"></div>
            </div>

            <div class="row mt-3">
              <div class="col-lg-3 col-md-4 label" style="font-weight: 600; color: rgba(1, 41, 112, 0.6);">NISN: </div>
              <div class="col-lg-9 col-md-8" id="siswa-info-nisn"></div>
            </div>

            <div class="row mt-3">
              <div class="col-lg-3 col-md-4 label" style="font-weight: 600; color: rgba(1, 41, 112, 0.6);">Kelas: </div>
              <div class="col-lg-9 col-md-8" id="siswa-info-kelas"></div>
            </div>

            <div class="row mt-3">
              <div class="col-lg-3 col-md-4 label" style="font-weight: 600; color: rgba(1, 41, 112, 0.6);">Tempat Lahir: </div>
              <div class="col-lg-9 col-md-8" id="siswa-info-tempat-lahir"></div>
            </div>

            <div class="row mt-3">
              <div class="col-lg-3 col-md-4 label" style="font-weight: 600; color: rgba(1, 41, 112, 0.6);">Tanggal Lahir: </div>
              <div class="col-lg-9 col-md-8" id="siswa-info-tanggal-lahir"></div>
            </div>

            <div class="row mt-3">
              <div class="col-lg-3 col-md-4 label" style="font-weight: 600; color: rgba(1, 41, 112, 0.6);">Jenis Kelamin: </div>
              <div class="col-lg-9 col-md-8" id="siswa-info-jenis-kelamin"></div>
            </div>
            <div class="row mt-3">
              <div class="col-lg-3 col-md-4 label" style="font-weight: 600; color: rgba(1, 41, 112, 0.6);">Nomor Telepon: </div>
              <div class="col-lg-9 col-md-8" id="siswa-info-nomor-telepon"></div>
            </div>
            <div class="row mt-3">
              <div class="col-lg-3 col-md-4 label" style="font-weight: 600; color: rgba(1, 41, 112, 0.6);">Alamat: </div>
              <div class="col-lg-9 col-md-8" id="siswa-info-alamat"></div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>