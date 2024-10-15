@extends('layouts.main')

@section('content')
@if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Ada Kesalahan',
            width: 400,
            heightAuto: true,
            backdrop: `rgba(0,0,0,0.5)`,
            html: '<ul class="list-unstyled">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>',
            confirmButtonText: 'Tutup'
        });
    </script>
@endif
<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item active"><a href="{{ route('profile') }}">Profile</a></li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<div class="section dashboard">
  <div class="row">
    <section class="section profile">

        <div class="row">

          <div class="col-xl-4">
            <div class="card">
              <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                <img src="{{ asset('img/profile.jpg') }}" alt="Profile" class="rounded-circle">
                <h2>{{ $operator->operator_nama }}</h2>
                <h3>Admin/Operator</h3>
                <div class="social-links mt-2">
                  <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                  <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                  <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                  <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-8">
            <div class="card">
              <div class="card-body pt-3">
                <ul class="nav nav-tabs nav-tabs-bordered" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link {{ !request('tab') ? 'active' : ''}}" data-bs-toggle="tab" data-bs-target="#profile-overview" aria-selected="true" role="tab" tabindex="-1">Overview</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link {{ request('tab') == 'edit' ? 'active' : ''}}" data-bs-toggle="tab" data-bs-target="#profile-edit" aria-selected="false" role="tab" tabindex="-1">Edit Profile</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link {{ request('tab') == 'password' ? 'active' : ''}}" data-bs-toggle="tab" data-bs-target="#profile-change-password" aria-selected="false" role="tab">Change Password</button>
                  </li>
                </ul>

                <div class="tab-content pt-2">
                  <div class="tab-pane fade profile-overview {{ !request('tab') ? 'active show' : ''}}" id="profile-overview" role="tabpanel">
                    <h5 class="card-title">Detail Profile</h5>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Username</div>
                      <div class="col-lg-9 col-md-8">{{ $operator->operator_username }}</div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Nama Lengkap</div>
                      <div class="col-lg-9 col-md-8">{{ $operator->operator_nama }}</div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Jenis Kelamin</div>
                      <div class="col-lg-9 col-md-8">{{ $operator->operator_jenis_kelamin ? 'Laki-laki' : 'Perempuan' }}</div>
                    </div>
  
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Kode Operator</div>
                      <div class="col-lg-9 col-md-8">{{ $operator->operator_kode }}</div>
                    </div>
  
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Email</div>
                      <div class="col-lg-9 col-md-8">{{ $operator->operator_email }}</div>
                    </div>
  
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Nomer Telepon</div>
                      <div class="col-lg-9 col-md-8">{{ $operator->operator_nomor_telepon }}</div>
                    </div>
  
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Operator Alamat</div>
                      <div class="col-lg-9 col-md-8">{{ $operator->operator_alamat }}</div>
                    </div>
                  </div>
  
                  <div class="tab-pane fade profile-edit {{ request('tab') == 'edit' ? 'active show' : '' }} pt-3" id="profile-edit" role="tabpanel">
                    <form action="{{route('profile.update', auth('operator')->user()->id)}}" method="POST" id="operator-form-edit">
                      @method('PUT')
                      @csrf
                      <div class="row mb-3">
                        <label for="operator-username-edit" class="col-md-4 col-lg-3 col-form-label">Username</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="operator_username" type="text" class="form-control @error('operator_username') is-invalid @enderror" id="operator-username-edit" value="{{ $operator->operator_username }}">
                          @error('operator_username')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="operator-nama-edit" class="col-md-4 col-lg-3 col-form-label">Nama Lengakp</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="operator_nama" type="text" class="form-control @error('operator_nama') is-invalid @enderror" id="operator-nama-edit" value="{{ $operator->operator_nama }}">
                          @error('operator_nama')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                      <div class="row mb-3">
                          <label for="operator-jenis-kelamin-edit" class="col-md-4 col-lg-3 col-form-label">Jeni Kelamin</label>
                          <div class="col-md-8 col-lg-9">
                          <select class="form-select @error('operator_jenis_kelamin') is-invalid @enderror" aria-label="Default select example" name="operator_jenis_kelamin" id="operator-jenis-kelamin-edit">
                              <option disabled {{ old('operator_jenis_kelamin') === null ? 'selected' : '' }}>Pilih opsi ini</option>
                              <option value="1" {{ old('operator_jenis_kelamin', $operator->operator_jenis_kelamin ) == '1' ? 'selected' : '' }}>Laki Laki</option>
                              <option value="0" {{ old('operator_jenis_kelamin', $operator->operator_jenis_kelamin ) == '0' ? 'selected' : '' }}>Perempuan</option>
                          </select>
                          </div>
                      </div>
                      <div class="row mb-3">
                          <label for="operator-kode-edit" class="col-md-4 col-lg-3 col-form-label">Kode Operator</label>
                          <div class="col-md-8 col-lg-9">
                              <input name="operator_kode" type="text" class="form-control @error('operator_kode') is-invalid @enderror" id="operator-kode-edit" value="{{ $operator->operator_kode }}">
                              @error('operator_kode')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                              @enderror
                          </div>
                      </div>
                      <div class="row mb-3">
                          <label for="operator-email-edit" class="col-md-4 col-lg-3 col-form-label">Email Operator</label>
                          <div class="col-md-8 col-lg-9">
                              <input name="operator_email" type="email" class="form-control @error('operator_email') is-invalid @enderror" id="operator-email-edit" value="{{ $operator->operator_email }}">
                              @error('operator_email')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                              @enderror
                          </div>
                      </div>
                      <div class="row mb-3">
                          <label for="operator-nomor-telepon-edit" class="col-md-4 col-lg-3 col-form-label">Nomor Telepon</label>
                          <div class="col-md-8 col-lg-9">
                              <input name="operator_nomor_telepon" type="number" class="form-control @error('operator_nomor_telepon') is-invalid @enderror" id="operator-nomor-telepon-edit" value="{{ $operator->operator_nomor_telepon }}">
                              @error('operator_nomor_telepon')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                              @enderror
                          </div>
                      </div>
                      <div class="row mb-3">
                          <label for="operator-alamat-edit" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                          <div class="col-md-8 col-lg-9">
                              <textarea name="operator_alamat" class="form-control @error('operator_alamat') is-invalid @enderror" id="operator-alamat-edit" style="height: 100px">{{ $operator->operator_alamat }}</textarea>
                              @error('operator_alamat')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                              @enderror
                          </div>
                      </div>
                      <div class="text-center">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                    </form>
                  </div>

                  <div class="tab-pane fade {{ request('tab') == 'password' ? 'active show' : ''}} pt-3" id="profile-change-password" role="tabpanel">
                    <form action="{{ route('password.update', auth('operator')->user()->id) }}" method="POST" id="operator-form-edit-password">
                      @csrf
                      @method('PUT')
                      <div class="row mb-3">
                        <label for="password-lama" class="col-md-4 col-lg-3 col-form-label">Password</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="password_lama" type="password" class="form-control @error('password_lama') is-invalid @enderror" id="password-lama">
                          @error('password_lama')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
  
                      <div class="row mb-3">
                        <label for="password-baru" class="col-md-4 col-lg-3 col-form-label">Password Baru</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="password_baru" type="password" class="form-control @error('password_baru') is-invalid @enderror" id="password-baru">
                          @error('password_baru')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
  
                      <div class="row mb-3">
                        <label for="password-baru-confirm" class="col-md-4 col-lg-3 col-form-label">Konfirmasi Password</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="password_baru_confirm" type="password" class="form-control @error('password_baru_confirm') is-invalid @enderror" id="password-baru-confirm">
                          @error('password_baru_confirm')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
  
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">Ubah password</button>
                      </div>  
                    </form>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </section>
  </div>
</div>
@include('operator_profile.proses')
@endsection