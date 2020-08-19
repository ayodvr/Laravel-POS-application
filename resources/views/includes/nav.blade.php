<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
  <div class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
      <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg collapse-btn"><i
            class="fas fa-bars"></i></a></li>
      <li>
      <div class="search-group">
        <span class="nav-link nav-link-lg" id="search">
            <i class="fa fa-search" aria-hidden="true"></i>
        </span>
        <input type="text" class="search-control" placeholder="search" aria-label="search" aria-describedby="search">
      </div>
      </li>
    </ul>
  </div>
  <ul class="navbar-nav navbar-right">
  <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
          <i class="fas fa-expand"></i>
        </a>
      </li>
    <li class="dropdown"><a href="#" data-toggle="dropdown"
        class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <div class="dropdown-title">Hello {{ Auth::user()->name }}</div>
        <span class="d-sm-none d-lg-inline-block"></span></a>
      <div class="dropdown-menu dropdown-menu-right">
        <a href="/index" class="dropdown-item has-icon">
          <i class="far fa-user"></i> Profile
        </a>
        <a href="#" class="dropdown-item has-icon">
          <i class="fas fa-cog"></i> Settings
        </a>
        <div class="dropdown-divider"></div>
        <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger" 
        onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}
        <i class="fas fa-sign-out-alt"></i>
      </a>
     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
         @csrf
     </form>
      </div>
    </li>
  </ul>
</nav>