<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Post;
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
        $countPosts = Post::count();
        $countPostsPublish = Post::where('post_status', 1)->count();
        $countPostsDraft = Post::where('post_status', 0)->count();
        return view('operator_dashboard.dashboard', [
            'pageTitle' => 'Dashboard',
            'operatorAktif' => $countOperatorAktif,
            'operatorTidakAktif' => $countOperatorTidakAktif,
            'guruTerdaftar' => $countGuruTerdaftar,
            'siswaTerdaftar' => $countSiswaTerdaftar,
            'countPosts' => $countPosts,
            'countPostsPublish' => $countPostsPublish,
            'countPostsDraft' => $countPostsDraft
        ]);
    }
}
