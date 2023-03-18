@extends('layouts.user')

@section('css')
<link rel="stylesheet" href="{{ asset('css/landing.css') }}">
@endsection

@section('title', 'Lapor!! - Pelaporan Masyarakat')

@section('content')

<section class="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
        <div class="container">
            <div class="container-fluid">
                <div class="mb-3 mr-3">
                    <img src="{{ asset('images/icon.svg') }}" alt="icon lapor" style="height: 50px">
                </div>
                <a class="navbar-brand" href="#">
                    <h4 class="semi-bold mb-0 text-white">Lapor!!</h4>
                    <p class="italic mt-0 text-white">Pelaporan Masyarakat</p>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    @if(Auth::guard('masyarakat')->check())
                    <ul class="navbar-nav text-center ml-auto">
                        <li class="nav-item">
                            <a class="nav-link ml-3 text-white" href="{{ route('lapor.laporan') }}">Laporan</a>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <div class="mt-1 ml-2 user dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="{{ asset('images/user.svg') }}" alt="user" style="width: 20px">
                                    <span><i class="fa-solid fa-caret-down text-white"></i></span>
                                </div>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="width: 175px">
                                  <a class="dropdown-item" href="{{ route('lapor.laporan') }}">{{ Auth::guard('masyarakat')->user()->username }}</a>
                                  <a class="dropdown-item" href="{{ route('lapor.logout') }}">Logout <span><i class="fa-solid fa-arrow-right-from-bracket m-1"></i></span></a>
                                </div>
                            </div>
                        </li>
                    </ul>
                    @else
                    <ul class="navbar-nav text-center ml-auto">
                        <li class="nav-item">
                            <button class="btn text-white" type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#loginModal">Masuk</button>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('lapor.formRegister') }}" class="btn btn-outline-purple">Daftar</a>
                        </li>
                    </ul>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <div class="text-center">
        <h2 class="medium text-white mt-3">Layanan Pengaduan Masyarakat</h2>
        <p class="italic text-white mb-5">Sampaikan laporan Anda langsung kepada yang pemerintah berwenang</p>
    </div>
    {{-- Wave --}}
    <div class="wave wave1"></div>
    <div class="wave wave2"></div>
    <div class="wave wave3"></div>
    <div class="wave wave4"></div>
</section>

<div class="row-content justify-content-center d-flex align-items-center mb-5">
    <div class="col-lg-6 col-10 col">
        <div class="content shadow">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif

            @if (Session::has('pengaduan'))
                <div class="alert alert-{{ Session::get('type') }}">{{ Session::get('pengaduan') }}</div>
            @endif

            <div class="card mb-3">Tulis Laporan Disini</div>
            <form action="{{ route('lapor.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <textarea name="isi_laporan" placeholder="Masukkan Isi Laporan" class="form-control"
                        rows="4">{{ old('isi_laporan') }}</textarea>
                </div>
                <div class="form-group">
                    <input type="file" name="foto" class="form-control">
                </div>
                <button type="submit" class="btn btn-custom mt-2">Kirim</button>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="mt-3">Masuk terlebih dahulu</h3>
                <p>Silahkan masuk menggunakan akun yang sudah didaftarkan.</p>
                <form action="{{ route('lapor.login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-purple text-white mt-3" style="width: 100%">MASUK</button>
                </form>
                @if (Session::has('pesan'))
                    <div class="alert alert-danger mt-2">
                        {{ Session::get('pesan') }}
                    </div>
                @endif
            </div>
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
</div>
@endsection

@section('js')
    @if (Session::has('pesan'))
    <script>
        $('#loginModal').modal('show');

    </script>
    @endif
@endsection