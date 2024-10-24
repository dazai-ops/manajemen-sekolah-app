<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\JadwalListController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FasilitasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function (){
  return redirect('/login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->middleware('operator.guest')->name('login');
Route::post('/login', [AuthController::class, 'checkLogin'])->middleware('operator.guest')->name('login.check');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/logout', function(){
  return redirect('/login');
});

Route::middleware('operator.auth')->group(function (){
  // Dashboard
  Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
  // Operator
  Route::resource('/dataoperator', OperatorController::class);
  Route::get('/dataoperator/{id}/get-status', [OperatorController::class, 'getStatus'])->name('dataoperator.getstatus');
  Route::put('/dataoperator/{id}/set-status', [OperatorController::class, 'updateStatus'])->name('dataoperator.setstatus');
  Route::get('/profile', [OperatorController::class, 'showProfile'])->name('profile');
  Route::put('/profile/{id}', [OperatorController::class, 'updateProfile'])->name('profile.update');
  Route::put('/password/{id}', [OperatorController::class, 'updatePassword'])->name('password.update');
  // Guru
  Route::resource('/dataguru', GuruController::class);
  // Mapel
  Route::resource('/datamapel', MapelController::class);
  // Siswa
  Route::resource('/datasiswa', SiswaController::class);
  // Jadwal
  Route::resource('/jadwal-pelajaran', JadwalListController::class);
  Route::get('/jadwal-pelajaran-list/{id}', [JadwalListController::class, 'jadwal_list']);
  // Kelas
  Route::resource('/datakelas', KelasController::class);
  Route::get('/datakelas/{id}/get-data', [KelasController::class, 'getDataKelas'])->name('datakelas.getdata');
  Route::get('/walikelas', [KelasController::class, 'getWaliKelas'])->name('walikelas');
  // Fasilitas Kelas
  Route::resource('/fasilitas', FasilitasController::class);
});
