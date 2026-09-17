
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Panel  </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('backend/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('backend/dist/css/adminlte.min.css')}}">

  <!-- DataTables -->
  <link rel="stylesheet" href="{{url('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href=" {{url('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{url('backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{url('backend/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{url('backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />


  <!-- Theme style -->
  <style>
  #loaders {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(255, 255, 255, 0.8);
    z-index: 9999;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .fa {
    font-size: 1.1rem;
    margin-left: 4px;
    margin-right: 8px;
}
#settingMsg{
  margin-left: 20rem !important;
}

</style>




</head>
<body class="hold-transition sidebar-mini ">
<!-- Site wrapper -->
<div class="wrapper">


<div id="loaders" style="display: none;">
  <!-- Add your loader HTML or image here -->
  <!-- <img src="{{url('backend/loader/loader.gif')}}"> -->
  <!-- <img src="{{url('backend/loader/1_CsJ05WEGfunYMLGfsT2sXA.gif')}}"> -->

</div>


  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav" style="margin-left: 15%">


      @if (Session::has('success'))
      <div class="alert alert-success mb-0">
        <strong>Created!</strong> {{ Session::get('success') }}
      </div>

      @endif

      @if (Session::has('danger'))
      <div class="alert alert-danger mb-0">
        <strong>Deleted!</strong> {{ Session::get('danger') }}
      </div>

      @endif

      @if (Session::has('info'))
      <div class="alert alert-info mb-0">
        <strong>Info!</strong> {{ Session::get('info') }}
      </div>

      @endif

      @if (Session::has('warning'))
      <div class="alert alert-info mb-0">
        <strong>Warning!</strong> {{ Session::get('warning') }}
      </div>

      @endif
      @if (Session::has('error'))
      <div class="alert alert-danger mb-0">
        <strong>Error!</strong> {{ Session::get('error') }}
      </div>

      @endif

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">gyan</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i>{{ auth()->user()->email }}
            <span class="float-right text-muted text-sm">



            @if (session('loginTimeAgo'))
                <div class="alert alert-success">
                    You last logged in {{ session('loginTimeAgo') }}.
                </div>
            @endif


          </span>
          </a>

          <div class="dropdown-divider"></div>
          <a href="{{route('logout')}}" class="dropdown-item dropdown-footer"> <i class="fas fa-sign-out-alt mr-3"></i>  Logout</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="{{url('backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">


      
<a href="#">
    <img
        src="{{ auth()->user()->picture &&
                file_exists(public_path('mechanics/' . auth()->user()->picture))
                ? asset('mechanics/' . auth()->user()->picture)
                : asset('backend/dist/img/user2-160x160.jpg') }}"
        class="img-circle elevation-2"
        alt="User Image"
    >
</a>
        </div>
        <div class="info">
      


        </div>
      </div>

          <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
    
      </nav>
    </div>
  </aside>
