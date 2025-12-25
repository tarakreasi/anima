<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MahasiswaModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // Calculate statistics
        $totalMahasiswa = MahasiswaModel::count();
        $mahasiswaBulanIni = MahasiswaModel::whereMonth('created_at', Carbon::now()->month)->count();
        
        // Calculate average age
        $avgAge = MahasiswaModel::all()
            ->avg(function($mahasiswa) {
                return Carbon::parse($mahasiswa->tgl_lahir)->age;
            });
        $rataRataUmur = round($avgAge ?? 0);
        
        // Get mahasiswa grouped by city for chart
        $chartKota = MahasiswaModel::select('tmp_lahir', DB::raw('count(*) as total'))
            ->groupBy('tmp_lahir')
            ->orderByDesc('total')
            ->limit(5)
            ->get();
        
        // Get recent mahasiswa
        $recentMahasiswa = MahasiswaModel::latest()
            ->limit(5)
            ->get();
        
        return view('home', compact(
            'totalMahasiswa',
            'mahasiswaBulanIni',
            'rataRataUmur',
            'chartKota',
            'recentMahasiswa'
        ));
    }
}
