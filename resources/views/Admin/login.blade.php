<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      {{-- Bootstrap --}}
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
      {{-- icon --}}
      <link rel="icon" href="{{ asset('images/admin.svg') }}">
      {{-- Sweet Alert --}}
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

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

      <title>Login Admin / Petugas</title>
   </head>
   <body>
      <div class="container">
         <div class="row justify-content-center">
             <div class="col-lg-5">
                 <div class="card mt-5">
                     <div class="card-body">
                         <h4 class="text-center mb-5">FORM PETUGAS / ADMIN</h4>
                         <form action="{{ route('admin.login') }}" method="POST">
                             @csrf
                             <div class="form-group">
                                 <input type="text" name="username" placeholder="Username" class="form-control">
                             </div>
                             <div class="form-group">
                                 <input type="password" name="password" placeholder="Password" class="form-control">
                             </div>
                             <button type="submit" class="btn btn-purple">MASUK</button>
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
   </body>
</html>