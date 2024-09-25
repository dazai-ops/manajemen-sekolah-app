<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed active" data-bs-target="#components-master" data-bs-toggle="collapse" href="">
        <i class="bi bi-menu-button-wide"></i><span>Master Data</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-master" class="nav-content collapse " data-bs-parent="#sidebar-nav">
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
          <a href="{{ route('datamapel.index') }}" class="{{ request()->routeIs('datamapel.*') ? 'active' : '' }}">
            <i class="bi bi-circle"></i><span>Mapel</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bi bi-circle"></i><span>Siswa</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bi bi-circle"></i><span>Jadwal</span>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-event" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>Events</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-event" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="components-alerts.html">
            <i class="bi bi-circle"></i><span>Posts</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bi bi-circle"></i><span>Events</span>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-heading">Pages</li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#">
        <i class="bi bi-person"></i>
        <span>Profile</span>
      </a>
    </li>
    <li class="nav-item">
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="nav-link collapsed">
          <i class="bi bi-box-arrow-right"></i>
          <span>Logout</span>
        </button>
      </form>
    </li>
  </ul>

</aside>