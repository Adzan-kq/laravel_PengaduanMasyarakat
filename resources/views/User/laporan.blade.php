@extends('layouts.user')

@section('css')
<link rel="stylesheet" href="{{ asset('css/landing.css') }}">
<link rel="stylesheet" href="{{ asset('css/laporan.css') }}">
{{-- Sweet Alert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@endsection

@section('title', 'Lapor!! - Pelaporan Masyarakat')

@section('content')
{{-- Section Header --}}
<section class="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
        <div class="container">
            <div class="container-fluid">
                <div class="mb-3 mr-3">
                    <img src="{{ asset('images/icon.svg') }}" alt="icon lapor" style="height: 50px">
                </div>
                <a class="navbar-brand" href="{{ route('lapor.index') }}">
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
                                    <img src="{{ asset('images/user.svg') }}" alt="user" class="" style="width: 20px">
                                    <span><i class="fa-solid fa-caret-down text-white"></i></span>
                                </div>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="width: 175px">
                                  <a class="dropdown-item" href="{{ route('lapor.index') }}">{{ Auth::guard('masyarakat')->user()->username }}</a>
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

</section>
{{-- Section Card --}}
<div class="container">
    <div class="row-content d-flex justify-content-between">
        <div class="col-lg-8 col-md-12 col-sm-12 col-12 col">
            <div class="content content-top shadow">
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
        <div class="col-lg-4 col-md-12 col-sm-12 col-12 col">
            <div class="content content-bottom shadow">
                <div>
                    <img src="{{ asset('images/user_default.svg') }}" alt="user profile" class="photo">
                    <div class="self-align">
                        <h5><a style="color: #6a70fc" href="#">{{ Auth::guard('masyarakat')->user()->nama }}</a></h5>
                        <p class="text-dark">{{ Auth::guard('masyarakat')->user()->username }}</p>
                    </div>
                    <div class="row text-center">
                        <div class="col">
                            <p class="italic mb-0">Terverifikasi</p>
                            <div class="text-center">
                                {{ $hitung[0] }}
                            </div>
                        </div>
                        <div class="col">
                            <p class="italic mb-0">Proses</p>
                            <div class="text-center">
                                {{ $hitung[1] }}
                            </div>
                        </div>
                        <div class="col">
                            <p class="italic mb-0">Selesai</p>
                            <div class="text-center">
                                {{ $hitung[2] }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5 mb-5">
        <div class="col-lg-8">
            <a class="d-inline tab {{ $siapa != 'me' ? 'tab-active' : ''}} mr-4" href="{{ route('lapor.laporan') }}">
                Semua
            </a>
            <a class="d-inline tab {{ $siapa == 'me' ? 'tab-active' : ''}}" href="{{ route('lapor.laporan', 'me') }}">
                Laporan Saya
            </a>
            <hr>
        </div>
        @foreach ($pengaduan as $k => $v)
        <div class="col-lg-8 card-content ml-3 mb-4">
            <div class="laporan-top">
                <img src="{{ asset('images/user_default.svg') }}" alt="profile" class="profile">
                <div class="d-flex justify-content-between">
                    <div>
                        <p class="font-weight-bold">{{ $v->user->nama }}</p>
                        @if ($v->status == '0')
                            <p class="text-danger">Pending</p>
                        @elseif($v->status == 'proses')
                            <p class="text-warning">{{ ucwords($v->status) }}</p>
                        @elseif($v->status == 'selesai')
                            <p class="text-success">{{ ucwords($v->status) }}</p>
                        @else
                            <p class="text-danger">{{ ucwords($v->status) }}</p>
                        @endif
                    </div>
                    <div>
                        <p class="font-weight-bold">{{ $v->tgl_pengaduan->format('d M, h:i') }}</p>
                    </div>
                </div>
            </div>
            <hr>
            <div class="laporan-mid">
                <div class="judul-laporan">
                    {{ $v->judul_laporan }}
                </div>
                <p class="font-weight-normal">{{ $v->isi_laporan }}</p>
            </div>
            <div class="laporan-bottom">
                @if ($v->foto != null)
                    <img src="{{ Storage::url($v->foto) }}" alt="{{ 'Gambar '.$v->judul_laporan }}" class="gambar-lampiran">
                @endif
                <hr>
                @if ($v->tanggapan != null)
                    <p class="mt-3 mb-1">{{ '*Tanggapan dari '. $v->tanggapan->petugas->nama_petugas }}</p>
                    <p class="light">{{ $v->tanggapan->tanggapan }}</p>
                @endif
            </div>
        </div>
        @endforeach
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
