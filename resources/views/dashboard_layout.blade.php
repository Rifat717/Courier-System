<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Go Delivery</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
        
        <link rel="stylesheet" href="{{asset ('public/dashboard/assets/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{asset ('public/dashboard/assets/vendors/iconly/bold.css') }}">
        <link rel="stylesheet" href="{{asset ('public/dashboard/assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
        <link rel="stylesheet" href="{{asset ('public/dashboard/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
        {{-- Data Table CDN --}}
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>
        {{-- <link rel="stylesheet" href="{{asset ('public/dashboard/assets/vendors/simple-datatables/style.css') }}"> --}}
        <!-- Toastr -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link rel="stylesheet" href="{{asset ('public/dashboard/assets/css/app.css') }}">
        <link rel="shortcut icon" href="public/dashboard/assets/images/favicon.svg" type="image/x-icon">
    </head>
    <body>
        <div id="app">
            <div id="sidebar" class="active">
                <div class="sidebar-wrapper active">
                    <div class="sidebar-header">
                        <div class="d-flex justify-content-between">
                            <div class="logo">
                                <a href="index.html"><img src="public/dashboard/assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                            </div>
                            <div class="toggler">
                                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-menu">
                        <ul class="menu">
                            <li class="sidebar-title">Menu</li>
                            <li class="sidebar-item">
                                <a href="{{ URL::to('/admin') }}" class='sidebar-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            {{-- <li class="sidebar-item">
                                <a href="{{ url('usertype') }}" class='sidebar-link'>
                                    <i class="bi bi-stack"></i>
                                    <span>User Type</span>
                                </a>
                                
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ url('userinfo') }}" class='sidebar-link'>
                                    <i class="bi bi-stack"></i>
                                    <span>User Info</span>
                                </a>
                                
                            </li> --}}
                            <li class="sidebar-item  has-sub">
                                <a href="#" class='sidebar-link'>
                                    <i class="bi bi-stack"></i>
                                    <span>User Menu</span>
                                </a>
                                <ul class="submenu ">
                                    <li class="submenu-item ">
                                        <a href="{{ url('userinfo') }}">User Info</a>
                                        <a href="{{ url('usertype') }}">User Type</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="sidebar-item  has-sub">
                                <a href="#" class='sidebar-link'>
                                    <i class="bi bi-stack"></i>
                                    <span>Area</span>
                                </a>
                                <ul class="submenu ">
                                    <li class="submenu-item ">
                                        <a href="{{ url('areainfo') }}">Area Info</a>
                                        
                                    </li>
                                </ul>
                                
                            </li>
                            <li class="sidebar-item  has-sub">
                                <a href="#" class='sidebar-link'>
                                    <i class="bi bi-stack"></i>
                                    <span>Product</span>
                                </a>
                                <ul class="submenu ">
                                    <li class="submenu-item ">
                                        {{-- <a href="{{ url('productinfo') }}">Product Info</a> --}}
                                        <a href="{{ url('productcategory') }}">Product Category</a>
                                        <a href="{{ url('producttype') }}">Product Type</a>
                                    </li>
                                </ul>
                            </li>
                            
                            <li class="sidebar-item  has-sub">
                                <a href="#" class='sidebar-link'>
                                    <i class="bi bi-stack"></i>
                                    <span>Parsel</span>
                                </a>
                                <ul class="submenu ">
                                    <li class="submenu-item ">
                                        <a href="{{ url('parsellinfo') }}">Parsel Info</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="sidebar-item  has-sub">
                                <a href="#" class='sidebar-link'>
                                    <i class="bi bi-stack"></i>
                                    <span>Assigned</span>
                                </a>
                                <ul class="submenu ">
                                    <li class="submenu-item ">
                                        <a href="{{ url('riderAssigned') }}">Parsel Assigned</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="sidebar-item  has-sub">
                                <a href="#" class='sidebar-link'>
                                    <i class="bi bi-stack"></i>
                                    <span>Components</span>
                                </a>
                                <ul class="submenu ">
                                    <li class="submenu-item ">
                                        <a href="component-alert.html">Alert</a>
                                    </li>
                                </ul>
                            </li>
                            
                        </ul>
                    </div>
                    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
                </div>
            </div>
            <div id="main">
                <header class='mb-3'>
                    <nav class="navbar navbar-expand navbar-light ">
                        <div class="container-fluid">
                            <a href="#" class="burger-btn d-block">
                                <i class="bi bi-justify fs-3"></i>
                            </a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                    <li class="nav-item dropdown me-1">
                                        <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class='bi bi-envelope bi-sub fs-4 text-gray-600'></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                            <li>
                                                <h6 class="dropdown-header">Mail</h6>
                                            </li>
                                            <li><a class="dropdown-item" href="#">No new mail</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown me-3">
                                        <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class='bi bi-bell bi-sub fs-4 text-gray-600'></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                            <li>
                                                <h6 class="dropdown-header">Notifications</h6>
                                            </li>
                                            <li><a class="dropdown-item">No notification available</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <div class="dropdown">
                                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                        <div class="user-menu d-flex">
                                            {{-- <div class="user-name text-end me-3">
                                                <h6 class="mb-0 text-gray-600">{{ Session::get('user_full_name') }}</h6>
                                                <p class="mb-0 text-sm text-gray-600">{{ Session::get('user_type_id') }}</p>
                                            </div>
                                            <div class="user-img d-flex align-items-center ">
                                                <div class="avatar avatar-md ">
                                                    <a class="btn btn-success" href="{{ url('/logout') }}">Logout</a>
                                                    
                                                </div>
                                            </div> --}}
                                            <div class="user-img d-flex align-items-center ">
                                                <div class="avatar avatar-md ">
                                                    <img src="public/dashboard/assets/images/faces/1.jpg">
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <h6 class="dropdown-header">Hello, {{ Session::get('user_full_name') }}!</h6>
                                        </li>
                                        <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i>{{ Session::get('user_type_id') }}</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i>
                                        Settings</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-wallet me-2"></i>
                                        Wallet</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="{{ url('/logout') }}"><i
                                        class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                </header>
                @yield('admin_content')
                <footer>
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p>2022 &copy; Go Delivery</p>
                        </div>
                        <div class="float-end">
                            <p><span class="text-danger">{{-- <i class="bi bi-heart"></i> --}}</span>  <a
                        href="http://ahmadsaugi.com"></a></p>
                        </div>
                    </div>
                </footer>
        </div>
    </div>
    
</body>
</html>