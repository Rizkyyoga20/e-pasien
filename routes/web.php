<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassPasien;
use App\Http\Controllers\ClassAkun;
use App\Http\Controllers\ClassObat;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ClassAkun::class, 'index'])->middleware('guest');
Route::get('/login', [ClassAkun::class, 'login'])->name('login')->middleware('guest');
Route::post('/loginn', [ClassAkun::class, 'action_login']);
Route::get('/profil', [ClassAkun::class, 'profil'])->middleware('guest');
Route::get('/sop', [ClassAkun::class, 'sop'])->middleware('guest');

Route::post('/logout', [Classakun::class, 'logout'])->middleware('auth');
Route::get('/dashboard', [ClassAkun::class, 'dashboard'])->middleware('auth');
Route::get('/upass', [ClassAkun::class, 'upass'])->middleware('auth');
Route::post('/upass', [ClassAkun::class, 'verifikasi'])->middleware('auth');
Route::get('/passb', [ClassAkun::class, 'passb'])->middleware('auth');
Route::put('/passb/update/{id}', [ClassAkun::class, 'update_pass'])->middleware('auth');
Route::get('/akun', [ClassAkun::class, 'akun'])->middleware('auth');
Route::post('/akun', [ClassAkun::class, 'action_akun'])->middleware('auth');
Route::get('/akun/tambah', [ClassAkun::class, 'eakun'])->middleware('auth');
Route::get('/akun/edit/{id}', [ClassAkun::class, 'edit'])->middleware('auth');
Route::put('/akun/update/{id}', [ClassAkun::class, 'update'])->middleware('auth');
Route::delete('/akun/del/{id}', [ClassAkun::class, 'delete'])->middleware('auth');
Route::get('/akun/biodata/', [ClassAkun::class, 'biodata'])->middleware('auth');
Route::put('/akun/biodata/{id}', [ClassAkun::class, 'edit_biodata'])->middleware('auth');

Route::get('/konsul', [ClassPasien::class, 'konsull'])->middleware('auth');

Route::get('/obat', [ClassObat::class, 'obat'])->middleware('auth');
Route::get('/obat/tambah', [ClassObat::class, 'tambah'])->middleware('auth');
Route::post('/obat/simpan', [ClassObat::class, 'simpan'])->middleware('auth');
Route::get('/obat/edit/{id}', [ClassObat::class, 'edit'])->middleware('auth');
Route::get('/obat/edit_gambar/{id}', [ClassObat::class, 'edit_img'])->middleware('auth');
Route::put('/obat/update/{id}', [ClassObat::class, 'update'])->middleware('auth');
Route::put('/obat/update_img/{id}', [ClassObat::class, 'update_img'])->middleware('auth');
Route::delete('/obat/del/{id}', [ClassObat::class, 'delete'])->middleware('auth');


Route::get('/pasien', [ClassPasien::class, 'pasien'])->middleware('auth');
Route::get('/pasien/tambah', [ClassPasien::class, 'epasien'])->middleware('auth');
Route::post('/pasien/save', [ClassPasien::class, 'save'])->middleware('auth');
Route::get('/pasien/edit/{id}', [ClassPasien::class, 'edit'])->middleware('auth');
Route::put('/pasien/update/{id}', [ClassPasien::class, 'update'])->middleware('auth');
Route::delete('/pasien/del/{id}', [ClassPasien::class, 'del'])->middleware('auth');
Route::get('/pasien/konsul/{id}', [ClassPasien::class, 'konsul'])->middleware('auth');
Route::get('/pasien/list_konsul/{id}', [ClassPasien::class, 'list_konsul'])->middleware('auth');
Route::post('/pasien/add_konsul/', [ClassPasien::class, 'add_konsul'])->middleware('auth');

Route::get('/pasien/resep/{id}', [ClassPasien::class, 'buat_resep'])->middleware('auth');
Route::put('/pasien/edit_konsul/{id}', [ClassPasien::class, 'edit_konsul'])->middleware('auth');
Route::post('/pasien/save_resep', [ClassPasien::class, 'simpan_resep'])->middleware('auth');
Route::get('/pasien/edit_resep/{id}', [ClassPasien::class, 'edit_resep'])->middleware('auth');
Route::put('/pasien/update_resep/{id}', [ClassPasien::class, 'update_resep'])->middleware('auth');
Route::delete('/pasien/delete_resep/{id}', [ClassPasien::class, 'delete_resep'])->middleware('auth');
Route::get('/pasien/add_info_konsul/', [ClassPasien::class, 'add_info_konsul'])->middleware('auth');
Route::post('/pasien/save_info_konsul/', [ClassPasien::class, 'save_info_konsul'])->middleware('auth');
Route::get('/pasien/info_konsul/', [ClassPasien::class, 'info_konsul'])->middleware('auth');
Route::get('/laporan', [ClassPasien::class, 'laporan'])->middleware('auth');