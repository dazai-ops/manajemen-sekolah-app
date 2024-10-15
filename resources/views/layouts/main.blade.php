<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ $pageTitle }}</title>
  @include('layouts.head')
  @include('layouts.swal')
  @include('layouts.logout')
</head>

<body>

  @include('layouts.topbar')

  @include('layouts.sidebar')

  {{-- Main content --}}
  <main id="main" class="main">
    @yield('content')
  </main>

  @include('layouts.footer')

  <a href="" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  
</body>
@include('sweetalert::alert')
@include('layouts.script')
</html>