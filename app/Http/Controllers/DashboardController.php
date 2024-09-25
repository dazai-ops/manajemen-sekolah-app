<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Operator;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    public function dashboard(){

        $countOperatorAktif = Operator::where('operator_is_aktif', 1)->count();
        $countOperatorTidakAktif = Operator::where('operator_is_aktif', 0)->count();
        $countGuruTerdaftar = Guru::count();
        $countSiswaTerdaftar = Siswa::count();
        return view('operator_dashboard.dashboard', [
            'pageTitle' => 'Dashboard',
            'operatorAktif' => $countOperatorAktif,
            'operatorTidakAktif' => $countOperatorTidakAktif,
            'guruTerdaftar' => $countGuruTerdaftar,
            'siswaTerdaftar' => $countSiswaTerdaftar
        ]);
    }
}
