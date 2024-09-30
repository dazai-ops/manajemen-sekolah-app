@extends('login.main')
@section('content')    
<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

        <div class="d-flex justify-content-center align-items-center flex-column">
          {{-- <a href="index.html" class="logo d-flex align-items-center flex-column w-auto">
            <span class="d-none d-lg-block">Welcome Back</span>
          </a> --}}
        </div><!-- End Logo -->
        
        <div class="card mb-3">
          
          <div class="card-body d-flex flex-column align-items-center">
            
            <img src="{{ asset('img/sma_5_surabaya.png') }}" alt="" class="mt-4" style="width: 110px; height:120px;">
            @if (session()->has('loginFailed'))
              <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                <i class="bi bi-exclamation-octagon me-1"></i>
                {{ session('loginFailed') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            <div class="pt-2 pb-2">
              <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
              <p class="text-center small">Enter your username & password to login</p>
            </div>

            <form action="{{ route('login.check') }}" method="POST" class="row g-3 needs-validation">
              @csrf
              <div class="col-12">
                <label for="operator_username" class="form-label">Username</label>
                <input type="text" name="operator_username" class="form-control" id="operator_username" required autofocus>
                {{-- @error('operator_username')                 
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror --}}
              </div>

              <div class="col-12">
                <label for="operator_password" class="form-label">Password</label>
                <input type="password" name="operator_password" class="form-control" id="operator_password" required>
                {{-- @error('operator_password')                 
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror --}}
              </div>
              <div class="col-12">
                <button class="btn btn-primary w-100" type="submit">Login</button>
              </div>
            </form>

          </div>
        </div>

        {{-- <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div> --}}
      </div>
    </div>
  </div>

</section>
@endsection