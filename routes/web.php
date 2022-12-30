<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\penjualanController;

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

Route::get('/', [penjualanController::class, 'transaksi'])->name('transaksi');

Route::get('/perusahaan', [penjualanController::class, 'perusahaan'])->name('perusahaan');
Route::get('/perusahaan/tambah', [penjualanController::class, 'perusahaan_tambah'])->name('perusahaan-tambah');
Route::post('/perusahaan/tambah/submit', [penjualanController::class, 'perusahaan_tambah_submit'])->name('perusahaan-tambah-submit');
Route::get('/perusahaan/ubah/{id}', [penjualanController::class, 'perusahaan_ubah'])->name('perusahaan-ubah');
Route::post('/perusahaan/ubah/submit/{id}', [penjualanController::class, 'perusahaan_ubah_submit'])->name('perusahaan-ubah-submit');
Route::post('/perusahaan/hapus/{id}', [penjualanController::class, 'perusahaan_hapus'])->name('perusahaan-hapus');

Route::get('/laptop', [penjualanController::class, 'laptop'])->name('laptop');
Route::get('/laptop/detail/{id}', [penjualanController::class, 'laptop_detail'])->name('laptop-detail');
Route::get('/laptop/tambah', [penjualanController::class, 'laptop_tambah'])->name('laptop-tambah');
Route::post('/laptop/tambah/submit', [penjualanController::class, 'laptop_tambah_submit'])->name('laptop-tambah-submit');
Route::get('/laptop/ubah/{id}', [penjualanController::class, 'laptop_ubah'])->name('laptop-ubah');
Route::post('/laptop/ubah/submit/{id}', [penjualanController::class, 'laptop_ubah_submit'])->name('laptop-ubah-submit');
Route::post('/laptop/hapus/{id}', [penjualanController::class, 'laptop_hapus'])->name('laptop-hapus');

Route::get('/transaksi', [penjualanController::class, 'transaksi'])->name('transaksi');
Route::get('/transaksi/detail/{id}', [penjualanController::class, 'transaksi_detail'])->name('transaksi-detail');
Route::get('/transaksi/detail/{id_transaksi}/laptop/{id_laptop}', [penjualanController::class, 'transaksi_detail_laptop'])->name('transaksi-detail-laptop');
Route::get('/transaksi/tambah', [penjualanController::class, 'transaksi_tambah'])->name('transaksi-tambah');
Route::post('/transaksi/tambah/submit', [penjualanController::class, 'transaksi_tambah_submit'])->name('transaksi-tambah-submit');
Route::get('/detail-transaksi/{id}', [penjualanController::class, 'detail_transaksi'])->name('detail-transaksi');
Route::get('/detail-transaksi/{id}/tambah', [penjualanController::class, 'detail_transaksi_tambah'])->name('detail-transaksi-tambah');
Route::get('/detail-transaksi/{id_transaksi}/tambah/{id_laptop}', [penjualanController::class, 'detail_transaksi_tambah_laptop'])->name('detail-transaksi-tambah-laptop');
Route::post('/detail-transaksi/{id_transaksi}/tambah/{id_laptop}/submit', [penjualanController::class, 'detail_transaksi_tambah_submit'])->name('detail-transaksi-tambah-submit');

// Route::get('/perusahaan-crud', function () {
//     return view('perusahaan-crud', ['tambah' => 'tambah']);
// });
