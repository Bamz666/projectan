<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\Matkul;
use App\Models\Nilai;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function index(Request $request)
    {
        $cari = $request->search;

        $data = DB::table('nilai')
            ->join('mahasiswa', 'mahasiswa.id_mahasiswa', '=', 'nilai.id_mahasiswa')
            ->join('matkul', 'matkul.id_matakuliah', '=', 'nilai.id_matakuliah')
            ->select('mahasiswa.*', 'matkul.*', 'nilai.*')
            ->where('mahasiswa.nama', 'LIKE', "%$cari%")
            ->orWhere('nilai.nilai_angka', 'LIKE', "%$cari%")
            ->get();

        $sum = DB::table('nilai')
            ->join('mahasiswa', 'mahasiswa.id_mahasiswa', '=', 'nilai.id_mahasiswa')
            ->join('matkul', 'matkul.id_matakuliah', '=', 'nilai.id_matakuliah')
            ->select('mahasiswa.*', 'matkul.*', 'nilai.*')
            ->where('mahasiswa.nama', 'LIKE', "%$cari%")
            ->orWhere('nilai.nilai_angka', 'LIKE', "%$cari%")
            ->sum('nilai_angka');

        $avg = DB::table('nilai')
            ->join('mahasiswa', 'mahasiswa.id_mahasiswa', '=', 'nilai.id_mahasiswa')
            ->join('matkul', 'matkul.id_matakuliah', '=', 'nilai.id_matakuliah')
            ->select('mahasiswa.*', 'matkul.*', 'nilai.*')
            ->where('mahasiswa.nama', 'LIKE', "%$cari%")
            ->orWhere('nilai.nilai_angka', 'LIKE', "%$cari%")
            ->avg('nilai_angka');

        return view('dashboard', compact('data', 'sum', 'avg'));
    }

    public function dashboard()
    {
    }
}
