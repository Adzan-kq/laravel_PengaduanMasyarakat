@extends('layouts.admin')

@section('title', 'Detail Masyarakat')
    
{{-- css --}}
@section('css')
   <style>
      .text-primary:hover{
         text-decoration: underline;
      }

      .text-grey {
         color: #6c757d;
      }

      .text-grey:hover {
         color: #6c757d;
      }

      .btn-purple {
         background: #6a70fc;
         border: 1px solid #6a70fc;
         color: #fff;
         width: 100%;
      }
   </style>
@endsection

@section('header')
   <a href="{{ route('masyarakat.index') }}" class="text-primary">Data Masyarakat</a>    
   <a href="#" class="text-grey">/</a>
   <a href="#" class="text-grey">Detail Masyarakat</a>
@endsection

@section('content')
   <div class="row">
      <div class="col-lg-6 col-12">
         <div class="card">
            <div class="card-header">
               <div class="text-center">
                  Detail MAsyarakat
               </div>
            </div>
            <div class="card-body">
               <table class="table">
                  <tbody>
                     <tr>
                        <th>NIK</th>
                        <td>:</td>
                        <td>{{ $masyarakat->nik }}</td>
                     </tr>
                     <tr>
                        <th>Nama</th>
                        <td>:</td>
                        <td>{{ $masyarakat->nama }}</td>
                     </tr>
                     <tr>
                        <th>Username</th>
                        <td>:</td>
                        <td>{{ $masyarakat->username }}</td>
                     </tr>
                     <tr>
                        <th>No Telp</th>
                        <td>:</td>
                        <td>{{ $masyarakat->telp }}</td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
@endsection