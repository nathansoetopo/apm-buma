<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="#">BUMA</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="#">ET</a>
      </div>
      <ul class="sidebar-menu">
        @if (auth()->user()->hasRole('admin'))
          <li class="menu-header">Dashboard</li>
          <li><a class="nav-link" href="#"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
          {{-- Scan --}}
          <li><a class="nav-link" href="{{url('barcode-scanner')}}"><i class="fas fa-camera"></i> <span>Scan Barcode</span></a></li>
          <li><a class="nav-link" href="#"><i class="fas fa-user-cog"></i> <span>Daftar Kepala</span></a></li>
        @elseif (auth()->user()->hasRole('kepala'))
          <li class="menu-header">Dashboard</li>
          <li><a class="nav-link" href="#"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
          {{-- Scan --}}
          <li><a class="nav-link" href="{{url('barcode-scanner')}}"><i class="fas fa-camera"></i> <span>Scan Barcode</span></a></li>
        @endif
        <li><a class="nav-link" href="#"><i class="fas fa-user-clock"></i> <span>Daftar Pegawai</span></a></li>
      </ul>
    </aside>
  </div>