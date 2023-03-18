@extends('layouts.user')

@section('css')
<style>
    body {
        background: #102b3e;
    }

    .btn-purple {
        background: #6a70fc;
        width: 100%;
        color: #fff;
    }

</style>
@endsection

@section('title', 'Halaman Daftar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card mt-5">
                <div class="card-body">
                    <h2 class="text-center mb-5">FORM REGISTER</h2>
                    <form action="{{ route('lapor.register') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="number" name="nik" placeholder="NIK" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="nama" placeholder="Nama Lengkap" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="username" placeholder="Username" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Password" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="number" name="telp" placeholder="No. Telp" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-purple">REGISTER</button>
                    </form>
                </div>
            </div>
            @if (Session::has('pesan'))
            <div class="alert alert-danger mt-2">
                {{ Session::get('pesan') }}
            </div>
            @endif
            <a href="{{ route('lapor.index') }}" class="btn btn-warning text-white mt-3" style="width: 100%">Kembali ke Halaman Utama</a>
        </div>
    </div>
</div>
@endsection
