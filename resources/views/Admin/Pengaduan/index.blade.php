@extends('layouts.admin')

@section('title', 'Halaman Pengaduan')

{{-- css --}}
@section('css')
   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
@endsection

@section('header', 'Data Pengaduan')
    
@section('content')
   <table id="tablePengaduan" class="table">
      <thead>
         <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Isi Laporan</th>
            <th>Status</th>
            <th>Detail</th>
         </tr>
      </thead>
      <tbody>
         @foreach ($pengaduan as $k => $v)
            <tr>
               <td>{{ $k += 1 }}</td>
               <td>{{ $v->tgl_pengaduan->format('d-M-Y') }}</td>
               <td>{{ $v->isi_laporan }}</td>
               <td>
                  @if ($v->status === '0')
                     <a href="#" class="badge badge-danger">Pending</a>
                  @elseif($v->status === 'proses')
                     <a href="#" class="badge badge-warning text-white">Proses</a>
                  @elseif($v->status === 'selesai')
                     <a href="#" class="badge badge-success">Selesai</a>
                  @elseif($v->status === 'ditolak')
                     <a href="#" class="badge badge-danger">Ditolak</a>
                  @endif
               </td>
               <td>
                  <a href="{{ route('pengaduan.show', $v->id_pengaduan) }}" style="text-decoration: none">Lihat</a>
               </td>
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
         $('#tablePengaduan').DataTable();
      });
   </script>
@endsection