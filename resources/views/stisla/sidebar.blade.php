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
        @elseif (auth()->user()->hasRole('kepala'))
        <li class="menu-header">Dashboard</li>
            <li><a class="nav-link" href="#"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
        @endif
      </ul>
{{--         <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
          <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-rocket"></i> Documentation
          </a>
        </div> --}}
    </aside>
  </div>