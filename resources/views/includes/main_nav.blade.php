<?php
  $user1      = Auth::user();
  $id         = $user1['id'];
  $usertype   = $user1['usertype'];
  $admin_get  = App\AdminProfile::where('user_id',$id)->first(); 
?>

<?php
      $user2      = Auth::user();
      $id         = $user2['id'];
      $usertype   = $user2['usertype'];
      $staff_get  = App\Staffs::where('user_id',$id)->first(); 
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
        <img alt="image" src="{{asset('assets/img/profile.png')}}" class="user-img-radious-style">
        <span class="d-sm-none d-lg-inline-block"></span></a>
      <div class="dropdown-menu dropdown-menu-right">
        @if($usertype == 'Admin')
        <div class="dropdown-title">Howdy, {{ $usertype }}</div>
        @endif
        @if($usertype == 'User')
        <div class="dropdown-title">Howdy, {{ $usertype }}</div>
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
@if($usertype == 'Admin')
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="/dashboard">
          {{-- <img alt="image" src="{{asset('assets/img/logo.png')}}" class="header-logo" /> --}}
          <span class="logo-name">StockBase &#174</span>
        </a>
      </div>
      <ul class="sidebar-menu">
        <ul class="sidebar-menu">
          <li class="menu-header">Main</li>
          <li class="dropdown">
            <a href="/dashboard"><i class="fas fa-home"></i><span>Dashboard</span></a>
          </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-align-justify"></i><span>Products</span></a>
              <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{route('categories.index')}}">Category</a></li>
              <li><a class="nav-link" href="{{route('categories.create')}}">Add Category</a></li>
              <li><a class="nav-link" href="{{route('products.index')}}">Products</a></li>
              <li><a class="nav-link" href="{{route('products.create')}}">Add product</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-industry"></i><span>Suppliers</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('suppliers.index')}}">View Suppliers</a></li>
                <li><a class="nav-link" href="{{route('suppliers.create')}}">Add Suppliers</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>Customers</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('customers.index')}}">View Customers</a></li>
                <li><a class="nav-link" href="{{route('customers.create')}}">Add Customers</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-credit-card"></i><span>Purchase</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('receiving.index')}}">Add Purchase</a></li>
              </ul>
              </li>
          <li class="dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-cart-arrow-down"></i><span>Sales</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{route('sales.index')}}">Add Sales</a></li>
          </ul>
          </li>
          {{-- <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-university"></i><span>Account</span></a>
            <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{route('accounts.index')}}">view Accounts</a></li>
            <li><a class="nav-link" href="{{route('transactions.index')}}">Transactions</a></li>
            </ul>
          </li> --}}
          <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-dollar-sign"></i><span>Expense</span></a>
            <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{route('expense.index')}}">View Expense</a></li>
            <li><a class="nav-link" href="{{route('expense_cat.create')}}">Expense Category</a></li>
            <li><a class="nav-link" href="{{route('expense.create')}}">Add Expense</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>Employees</span></a>
            <ul class="dropdown-menu">
            <li><a class="nav-link" href="/staffs">View Employees</a></li>
            <li><a class="nav-link" href="#" data-toggle="modal" data-target="#registerModal">Add Employee</a></li>
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
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-money-check-alt"></i><span>Report</span></a>
            <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{route('salesreport.index')}}">Sales Report</a></li>
            <li><a class="nav-link" href="{{route('receivingsreport.index')}}">Purchase Report</a></li>
            </ul>
          </li>
          {{-- <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fab fa-gg"></i><span>Apps</span></a>
            <ul class="dropdown-menu">
              <li><a class="fas-fa-comments" href="/chatify" target="_blank">Chat</a></li>
            </ul>
          </li> --}}
          {{-- <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-cog"></i><span>Settings</span></a>
            <ul class="dropdown-menu">
              {{-- <li><a class="nav-link" href="/staffs/trashed">Restore Staffs</a></li> --}}
            </ul>
          </li> --}}
        </ul>
    </aside>
  </div>
  @endif
  
  @if($usertype == 'User')
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
            <a href="/home"><i class="fas fa-home"></i><span>Dashboard</span></a>
          </li>
          <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-align-justify"></i><span>Products</span></a>
            <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{route('categories.index')}}">Category</a></li>
            {{-- <li><a class="nav-link" href="{{route('categories.create')}}">Add Category</a></li> --}}
            <li><a class="nav-link" href="{{route('products.index')}}">Product List</a></li>
            {{-- <li><a class="nav-link" href="{{route('products.create')}}">Add product</a></li> --}}
            </ul>
          </li>
          <li class="dropdown">
            <a href="{{route('suppliers.index')}}"><i class="fas fa-industry"></i><span>Suppliers</span></a>
          </li>
          <li class="dropdown">
            <a href="{{route('customers.index')}}"><i class="fas fa-users"></i><span>Customers</span></a>
          </li>
        <li class="dropdown">
        <a href="{{route('sales.index')}}"><i class="fas fa-cart-arrow-down"></i><span>Sales</span></a>
        </li>
          <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i><span>Profile</span></a>
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