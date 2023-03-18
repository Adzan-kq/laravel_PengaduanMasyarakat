<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Petugas;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil semua data petugas dalam model Petugas
        $petugas = Petugas::all()->count();
        // Ambil semua data masyarakat dalam model Masyarakat
        $masyarakat = Masyarakat::all()->count();
        // Ambil semua data pengaduan dalam model Pengaduan
        $proses = Pengaduan::where('status', 'proses')->get()->count();
        $selesai = Pengaduan::where('status', 'selesai')->get()->count();

        return view('Admin.Dashboard.index', [
            'petugas' => $petugas, 
            'masyarakat' => $masyarakat, 
            'proses' => $proses, 
            'selesai' => $selesai 
        ]);
    }
}
