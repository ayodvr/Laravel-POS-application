<?php
  $id = Auth::user()->id;
  $admin_get = App\AdminProfile::where('user_id','=',$id)->first(); 
?>

<?php
$id = Auth::user()->id;
$staff_get = App\Staffs::where('user_id','=',$id)->first(); 
?>

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
        <img alt="image" src="{{asset('assets/img/users.png')}}" class="user-img-radious-style">
        <span class="d-sm-none d-lg-inline-block"></span></a>
      <div class="dropdown-menu dropdown-menu-right">
        @if(Auth::user()->usertype == 'Admin')
        <div class="dropdown-title">Howdy, {{ auth()->user()->usertype }}</div>
        @endif
        @if(Auth::user()->usertype == 'User')
        <div class="dropdown-title">Howdy, {{ auth()->user()->usertype }}</div>
        @endif
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
@if(Auth::user()->usertype == 'Admin')
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="/dashboard">
          {{-- <img alt="image" src="{{asset('assets/img/logo.png')}}" class="header-logo" /> --}}
          <span class="logo-name">Grexa</span>
        </a>
      </div>
      <ul class="sidebar-menu">
        <ul class="sidebar-menu">
          <li class="menu-header">Main</li>
          <li class="dropdown active">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-home"></i><span>Dashboard</span></a>
            <ul class="dropdown-menu">
              <li class="active"><a class="nav-link" href="/dashboard">Home</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i><span>Profile</span></a>
            <ul class="dropdown-menu">
                @if(empty($admin_get))
                <li><a class="nav-link" href="/adminprofile/create">Complete Profile</a></li>
                @endif
                @if(!empty($admin_get)) 
                <li><a class="nav-link" href="/adminprofile/{{$admin_get->id}}/edit">Update</a></li>
                @endif
                @if(!empty($admin_get)) 
                <li><a class="nav-link" href="/adminprofile/{{$admin_get->id}}">View</a></li>
                @endif
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>Staffs</span></a>
            <ul class="dropdown-menu">
            <li><a class="nav-link" href="#" data-toggle="modal" data-target="#registerModal">Add Staff</a></li>
            <li><a class="nav-link" href="/staffs">View Staffs</a></li>
            </ul>
          </li><li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>Staffs</span></a>
            <ul class="dropdown-menu">
            <li><a class="nav-link" href="#" data-toggle="modal" data-target="#registerModal">Add Staff</a></li>
            <li><a class="nav-link" href="/staffs">View Staffs</a></li>
            </ul>
          </li>
          {{-- <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fab fa-app-store"></i><span>Apps</span></a>
            <ul class="dropdown-menu">
              <li><a class="fas-fa-comments" href="/chatify">Chat</a></li>
              <li><a class="nav-link" href="/calendar">Calendar</a></li>
            </ul>
          </li> --}}
          <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-cog"></i><span>Settings</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="/staffs/trashed">Restore Staffs</a></li>
            </ul>
          </li>
        </ul>
    </aside>
  </div>
  @endif
  
  @if(Auth::user()->usertype == 'User')
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="/dashboard">
          {{-- <img alt="image" src="{{asset('assets/img/logo.png')}}" class="header-logo" /> --}}
          <span class="logo-name">Grexa</span>
        </a>
      </div>
      <ul class="sidebar-menu">
        <ul class="sidebar-menu">
          <li class="menu-header">Main</li>
          <li class="dropdown active">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-home"></i><span>Dashboard</span></a>
            <ul class="dropdown-menu">
              <li class="active"><a class="nav-link" href="/home">Home</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i><span>Profile</span></a>
            <ul class="dropdown-menu">
                @if(!empty($staff_get))
                <li><a class="nav-link" href="/staffs/{{$staff_get->id}}/edit">Update</a></li>
                @endif
                @if(empty($staff_get))
                <li><a class="nav-link" href="/staffs/create">Complete Profile</a></li>
                @endif
                @if(!empty($staff_get))
                <li><a class="nav-link" href="/staffs/{{$staff_get->id}}">View</a></li>
                @endif
            </ul>
          </li>
          {{-- <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fab fa-app-store"></i><span>Apps</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="/chatify">Chat</a></li>
              <li><a class="nav-link" href="/calendar">Calendar</a></li>
            </ul>
          </li> --}}
          <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-cog"></i><span>Settings</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="/password/reset">Reset password</a></li>
            </ul>
          </li>
        </ul>
    </aside>
  </div>
  @endif