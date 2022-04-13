<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RKAController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\RealisasiAnggaranController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RKAAdminController;
use App\Http\Controllers\ProgramAdminController;
use App\Http\Controllers\RealisasiAnggaranAdminController;




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


//hak akses admin
Route::get('/',[HomeController::class, 'index']);

Route::group(['middleware' => 'admin'], function(){
    Route::get('/admin/user',[AdminController::class, 'daftarUser'])->name('user');
    Route::get('/admin/unit',[AdminController::class, 'daftarUnit'])->name('admin');
    Route::post('/admin/insertUnit',[AdminController::class, 'insertUnit']);
    Route::get('/admin/addUnit',[AdminController::class, 'addUnit']);
    Route::get('/admin/addUser',[AdminController::class, 'addUser']);
    Route::post('/admin/insertUser',[AdminController::class, 'insertUser']);
    Route::get('/admin/deleteUser/{id}',[AdminController::class, 'deleteUser']);
    Route::get('/admin/editUser',[AdminController::class, 'editUser']);
    Route::get('/admin/editUnit/{kode_unit}',[AdminController::class, 'editUnit']);
    Route::post('/admin/updateUnit/{kode_unit}',[AdminController::class, 'updateUnit']);
    Route::get('/admin/deleteUnit/{kode_unit}',[AdminController::class, 'deleteUnit']);
    Route::post('/admin/insertStatusUser/{id}',[AdminController::class, 'insertStatusUser']);
});

//hak akses wr
Route::group(['middleware' => 'wr'], function(){
    Route::get('/admin/rkaUnitAdmin',[AdminController::class, 'index']);
    Route::get('/admin/realisasiUnitAdmin',[AdminController::class, 'realisasiUnitAdmin']);
    //Route::get('/rka/admin/{kode_unit}',[RKAAdminController::class, 'index']);
    Route::get('/admin/daftarRKAAdmin/{kode_unit}',[AdminController::class, 'daftarRKAAdmin']);
    
    Route::get('/program/admin/printProgram/{id_rka}',[ProgramAdminController::class, 'printProgram']);
    Route::get('/program/admin/{kode_unit}/{tahun_anggaran}',[ProgramAdminController::class, 'index'])->name('programAdmin');
    Route::get('/program/detail/admin/{id_rka}',[ProgramAdminController::class, 'detail']);
    Route::post('/program/admin/insertStatus/{id_rka}',[ProgramAdminController::class, 'insertStatus']);
    Route::get('/program/admin/printRKA/{kode_unit}/{tahun_anggaran}',[ProgramAdminController::class, 'printRKA']);

    Route::get('/realisasiAnggaran/admin/realisasiRKAAdmin/{kode_unit}',[RealisasiAnggaranAdminController::class, 'realisasiRKAAdmin']);
    Route::get('/realisasiAnggaran/admin/printRealisasi/{kode_unit}',[RealisasiAnggaranAdminController::class, 'printRealisasi']);


    Route::get('/realisasiAnggaran/admin/{kode_unit}/{tahun_anggaran}',[RealisasiAnggaranAdminController::class, 'index'])->name('realisasiAdmin');
    Route::post('/realisasiAnggaran/insertStatus/{id_realisasi}',[RealisasiAnggaranAdminController::class, 'insertStatus']);

});

//hak akses user
Route::group(['middleware' => 'user'], function(){
    Route::get('/rka/addRKA',[RKAController::class, 'addRKA'])->name('addRKA');
    Route::post('/rka/insertRKA',[RKAController::class, 'insertRKA']);
    Route::get('/rka/addprogram',[RKAController::class, 'addProgram'])->name('addProgram');
    Route::get('/rka/RKAUnit',[RKAController::class, 'RKAUnit'])->name('RKAUnit');
    Route::post('/rka/updateRKA/{id_rka}/{tahun_anggaran}',[RKAController::class, 'updateRKA'])->name('updateRKA');
    Route::get('/rka/deleteRKA/{id_rka}',[RKAController::class, 'deleteRKA']);
    Route::get('/rka/{kode_unit}',[RKAController::class, 'index'])->name('indexRKA');

    Route::get('/program/detail/{id_rka}',[ProgramController::class, 'detail'])->name('program2');
    Route::post('/program/insertProgram',[ProgramController::class, 'insertProgram']);
    Route::get('/program/edit/{id_rka}',[ProgramController::class, 'edit']);
    Route::get('/program/editProgram/{id_program}/{tahun_anggaran}/{kode_unit}',[ProgramController::class, 'editProgram']);
    Route::post('/program/updateProgram/{id_program}',[ProgramController::class, 'updateProgram']);
    Route::get('/program/printRKA/{kode_unit}/{tahun_anggaran}',[ProgramController::class, 'printRKA']);
    Route::get('/program/printProgramKegiatan/{id_rka}',[ProgramController::class, 'printProgramKegiatan']);
    Route::get('/program/deleteProgramKegiatan/{id_program}',[ProgramController::class, 'deleteProgramKegiatan']);
    Route::get('/program/addProgramKegiatan/{id_rka}',[ProgramController::class, 'addProgramKegiatan']);
    Route::post('/program/insertDataProgram/{id_rka}',[ProgramController::class, 'insertDataProgram']);
    Route::get('/program/{kode_unit}/{tahun_anggaran}',[ProgramController::class, 'index'])->name('program');
    
    Route::get('/realisasiAnggaran/daftar/{kode_unit}/{tahun_anggaran}',[RealisasiAnggaranController::class, 'index'])->name('realisasi');
    Route::get('/realisasiAnggaran/uploadLaporan/{id_program}/{mata}/{tahun_anggaran}',[RealisasiAnggaranController::class, 'uploadLaporan']);
    Route::post('/realisasiAnggaran/insertLaporan',[RealisasiAnggaranController::class, 'insertLaporan']);
    Route::get('/realisasiAnggaran/detailRealisasiAnggaran/{id_realisasi}',[RealisasiAnggaranController::class, 'detailRealisasiAnggaran']);
    Route::get('/realisasiAnggaran/unit',[RealisasiAnggaranController::class, 'unit']);
    Route::get('/realisasiAnggaran/print/{kode_unit}',[RealisasiAnggaranController::class, 'print']);
    Route::get('/realisasiAnggaran/realisasiRKA/{kode_unit}',[RealisasiAnggaranController::class, 'realisasiRKA']);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
