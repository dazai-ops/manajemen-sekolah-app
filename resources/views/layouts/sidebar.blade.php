<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-heading">Pages</li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li>

    <li class="nav-heading">Master</li>
    <li class="nav-item">
      <a class="nav-link collapsed active" data-bs-target="#menu-master-data" data-bs-toggle="collapse" href="">
        <i class="bi bi-menu-button-wide"></i><span>Master Data</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="menu-master-data" class="nav-content collapse active" data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ route('dataoperator.index') }}" class="{{ request()->routeIs('dataoperator.*') ? 'active' : '' }}">
            <i class="bi bi-circle"></i><span>Operator</span>
          </a>
        </li>
        <li>
          <a href="{{ route('dataguru.index') }}" class="{{ request()->routeIs('dataguru.*') ? 'active' : '' }}">
            <i class="bi bi-circle"></i><span>Guru</span>
          </a>
        </li>
        <li>
          <a href="{{ route('datasiswa.index') }}" class="{{ request()->routeIs('datasiswa.*') ? 'active' : ''}}">
            <i class="bi bi-circle"></i><span>Siswa</span>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed active" data-bs-target="#menu-master-data-kelas" data-bs-toggle="collapse" href="">
        <i class="bi bi-buildings"></i></i></i><span>Master Kelas</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="menu-master-data-kelas" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ route('datakelas.index') }}" class="{{ request()->routeIs('datakelas.*') ? 'active' : ''}}">
            <i class="bi bi-circle"></i><span>Kelas</span>
          </a>
        </li>
        <li>
          <a href="{{ route('fasilitas.index') }}" class="{{ request()->routeIs('fasilitas.*') ? 'active' : ''}}">
            <i class="bi bi-circle"></i><span>Fasilitas Kelas</span>
          </a>
        </li>
        <li>
          <a href="{{ route('walikelas') }}" class="{{ request()->routeIs('walikelas.*') ? 'active' : ''}}">
            <i class="bi bi-circle"></i><span>Wali Kelas</span>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed active" data-bs-target="#menu-master-data-pelajaran" data-bs-toggle="collapse" href="">
        <i class="bi bi-journal-text"></i><span>Master Pelajaran</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="menu-master-data-pelajaran" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ route('datamapel.index') }}" class="{{ request()->routeIs('datamapel.*') ? 'active' : '' }}">
            <i class="bi bi-circle"></i><span>Mapel</span>
          </a>
        </li>
        <li>
          <a href="{{ route('jadwal-pelajaran.index') }}" class="{{ request()->routeIs('jadwal-pelajaran.*') ? 'active' : '' }}">
            <i class="bi bi-circle"></i><span>Jadwal Pelajaran</span>
          </a>
        </li>
      </ul>
    </li>

    {{-- <li class="nav-heading">Pages</li>
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#menu-master-data-events" data-bs-toggle="collapse" href="#">
        <i class="bi bi-send"></i></i><span>Publikasi & Event</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="menu-master-data-events" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ route('post.index') }}" class="{{ request()->routeIs('posts.*') ? 'active' : ''}}">
            <i class="bi bi-circle"></i><span>Posts</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bi bi-circle"></i><span>Events</span>
          </a>
        </li>
      </ul>
    </li> --}}

    <li class="nav-heading">Aksi Akun</li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('profile')}}">
        <i class="bi bi-person"></i>
        <span>Profile</span>
      </a>
    </li>
    <li class="nav-item">
      <form id="sidebar-logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="nav-link collapsed">
          <i class="bi bi-box-arrow-right"></i>
          <span>Logout</span>
        </button>
      </form>
    </li>
  </ul>
</aside>