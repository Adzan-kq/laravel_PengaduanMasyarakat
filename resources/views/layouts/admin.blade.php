<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>@yield('title')</title>
   {{-- Bootstrap --}}
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
      integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
   {{-- icon --}}
   <link rel="icon" href="{{ asset('images/admin.svg') }}">
   {{-- Font Awesome --}}
   <script src="https://kit.fontawesome.com/ab21e8660d.js" crossorigin="anonymous"></script>
        
   @yield('css')

   <style>
      .btn-purple {
         background: #6a70fc;
         border: 1px solid #6a70fc;
         color: #fff;
      }

      .btn-purple:hover {
         background: #4548b6;
         border: 1px solid #6a70fc;
         color: #fff;
      }
   </style>

   <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3 class="mb-0">Lapor!!</h3>
                <p class="text-white mb-0">Pelaporan Masyarakat</p>
            </div>
            <ul class="list-unstyled components">
                @if(Auth::guard('admin')->user()->level == 'petugas')
                    <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                        <a href="{{ route('dashboard.index') }}"><span><i class="fa-light fa-gauge"></i></span> Dashboard</a>
                    </li>
                    <li class="{{ Request::is('admin/pengaduan') ? 'active' : '' }}">
                        <a href="{{ route('pengaduan.index') }}"><span class="mt-1 mr-1"><i class="nav-icon fa-solid fa-pen"></i></span> Pengaduan</a>
                    </li>
                @else
                    <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                        <a href="{{ route('dashboard.index') }}"><span class="mt-1 mr-2"><i class="nav-icon fa-solid fa-gauge"></i></span> Dashboard</a>
                    </li>
                    <li class="{{ Request::is('admin/pengaduan') ? 'active' : '' }}">
                        <a href="{{ route('pengaduan.index') }}"><span class="mt-1 mr-2"><i class="nav-icon fa-solid fa-pen"></i></span> Pengaduan</a>
                    </li>
                    <li class="{{ Request::is('admin/petugas') ? 'active' : '' }}">
                        <a href="{{ route('petugas.index') }}"><span class="mt-1 mr-2"><i class="nav-icon fa-solid fa-user"></i></span> Petugas</a>
                    </li>
                    <li class="{{ Request::is('admin/masyarakat') ? 'active' : '' }}">
                        <a href="{{ route('masyarakat.index') }}"><span class="mt-1 mr-1"><i class="nav-icon fa-solid fa-users"></i></span> Masyarakat</a>
                    </li>
                    <li class="{{ Request::is('admin/laporan') ? 'active' : '' }}">
                        <a href="{{ route('laporan.index') }}"><span class="mt-1 mr-2"><i class="nav-icon fa-solid fa-file"></i></span> Laporan</a>
                    </li>
                @endif
                <li>
                    <a href="{{ route('admin.logout') }}">Logout<span><i class="fa-solid fa-arrow-right-from-bracket ml-2 mt-1"></i></span></a>
                </li>
            </ul>
        </nav>

        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
                    <div class="ml-2">
                        @yield('header')
                    </div>
                    <div class="collapse navbar-collapse flex justify-between" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <a href="#" class="btn btn-white btn-sm">{{ Auth::guard('admin')->user()->nama_petugas }}</a>
                        </ul>
                    </div>
                </div>
            </nav>
            @yield('content')
        </div>
    </div>

    
    <!-- Script untuk menampilkan SweetAlert -->
    @if(session('status') == 'success')
        <script>
            Swal.fire({
                position: 'center',
                title: 'Berhasil!',
                text: '{{ session('message') }}',
                icon: 'success',
                showConfirmButton: false,
                timer: 1500
            }).then((result) => {
                window.location.href = "/";
            });
        </script>
    @endif

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

    <script>
      $(document).ready(function () {
         $('#sidebarCollapse').on('click', function () {
               $('#sidebar').toggleClass('active');
               $(this).toggleClass('active');
         });
      });
    </script>

    @yield('js')
    </body>
</html>
