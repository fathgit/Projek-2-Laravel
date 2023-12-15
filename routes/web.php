<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\EmployeeController;
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

/*Route::get('/', function () {
    return view('welcome');});*/

Route::get('/',[EmployeeController::class,'welcome'])->name('welcome')->middleware('auth');

Route::get('/pegawai',[EmployeeController::class,'index'])->name('pegawai')->middleware('auth');

Route::get('/tambahpegawai',[EmployeeController::class,'tambahpegawai'])->name('tambahpegawai')->middleware('auth');

Route::post('/insertdata',[EmployeeController::class,'insertdata'])->name('insertdata');

Route::get('/tampilkandata/{id}',[EmployeeController::class,'tampilkandata'])->name('tampilkandata')->middleware('auth');

Route::post('/updatedata/{id}',[EmployeeController::class,'updatedata'])->name('updatedata');

Route::get('/delete/{id}',[EmployeeController::class,'delete'])->name('delete');

Route::get('/login',[LoginController::class,'login'])->name('login');

Route::post('/loginproses',[LoginController::class,'loginproses'])->name('loginproses');

Route::get('/register',[LoginController::class,'register'])->name('register');

Route::post('/registeruser',[LoginController::class,'registeruser'])->name('registeruser');

Route::get('/logout',[LoginController::class,'logout'])->name('logout');

Route::get('/user',[UserController::class,'index'])->name('index')->middleware('auth');

Route::get('/user/create',[UserController::class,'create'])->name('user.create')->middleware('auth');

Route::post('/user',[UserController::class,'store'])->name('user.store');

Route::get('/user/edit/{id}',[UserController::class,'edit'])->name('user.edit')->middleware('auth');

Route::post('/user/update/{id}',[UserController::class,'update'])->name('user.update');

Route::post('/user/delete/{id}',[UserController::class,'destroy'])->name('user.destroy');

Route::get('/dokumen',[DokumenController::class,'dokumen'])->name('dokumen.dokumen')->middleware('auth');

Route::get('/dokumen/create',[DokumenController::class,'create'])->name('dokumen.tambahdokumen')->middleware('auth');

Route::post('/dokumen',[DokumenController::class,'store'])->name('dokumen.store');

Route::post('/dokumen/delete/{id}',[DokumenController::class,'destroy'])->name('dokumen.destroy');

Route::get('/dokumen/edit/{id}',[DokumenController::class,'edit'])->name('dokumen.editdokumen');

Route::post('/dokumen/update/{id}',[DokumenController::class,'update'])->name('dokumen.update');

Route::resource('pegawai/search', EmployeeController::class)->except(['index'])->middleware('auth');

Route::get('/pegawai/search', [EmployeeController::class, 'search'])->name('pegawai.search')->middleware('auth');

Route::resource('user/search', UserController::class)->except(['index'])->middleware('auth');

Route::get('/user/search', [UserController::class, 'search'])->name('user.search')->middleware('auth');

Route::resource('dokumen/search', DokumenController::class)->except(['index'])->middleware('auth');

Route::get('/dokumen/search', [DokumenController::class, 'search'])->name('dokumen.search')->middleware('auth');



