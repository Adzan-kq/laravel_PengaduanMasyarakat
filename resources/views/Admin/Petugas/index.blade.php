@extends('layouts.admin')

@section('title', 'Halaman Petugas')

{{-- css --}}
@section('css')
   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
@endsection

@section('header', 'Data Petugas')

@section('content')
   <a href="{{ route('petugas.create') }}" class="btn btn-purple mb-3">Tambah Petugas</a>
   <table id="tablePetugas" class="table">
      <thead>
         <tr>
            <th>No</th>
            <th>Nama Petugas</th>
            <th>Username</th>
            <th>Telp</th>
            <th>Level</th>
            <th>Detail</th>
         </tr>
      </thead>
      <tbody>
         {{-- $k untuk key dan $v untuk value --}}
         @foreach ($petugas as $k => $v)
            <tr>
               <td>{{ $k += 1 }}</td>
               <td>{{ $v->nama_petugas }}</td>
               <td>{{ $v->username }}</td>
               <td>{{ $v->telp }}</td>
               <td>{{ $v->level }}</td>
               <td><a href="{{ route('petugas.edit', $v->id_petugas) }}">Lihat</a></td>
            </tr>             
         @endforeach
      </tbody>
   </table>
@endsection

{{-- Javascript --}}
@section('js')
   <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
   <script>
      $(document).ready(function () {
         $('#tablePetugas').DataTable();
      });
   </script>
@endsection