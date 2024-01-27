<?php

use App\Http\Controllers\LoginController;
use App\Models\Cashier;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CashierController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    $jumlahpesanan = Cashier::count();
    return view('dashboard',compact('jumlahpesanan'));
})->middleware('auth');
//Route::get('/admin', [CashierController::class,'admin'])->name('admin');
//Route::get('/dashboard', [CashierController::class,'dashboard'])->name('dashboard');
Route::get('/daftarpesanan', [CashierController::class,'index'])->name('cashiers')->middleware('auth');
Route::get('/tambahpesanan', [CashierController::class,'tambahpesanan'])->name('tambahpesanan')->middleware('auth');
Route::post('/insertdata', [CashierController::class,'insertdata'])->name('insertdata')->middleware('auth');
Route::get('/tampildata/{id} ', [CashierController::class,'tampildata'])->name('tampildata')->middleware('auth');
Route::post('/updatedata/{id} ', [CashierController::class,'updatedata'])->name('updatedata')->middleware('auth');
Route::get('/delete/{id}', [CashierController::class,'delete'])->name('delete');
Route::get('/exportexcel ', [CashierController::class,'exportexcel'])->name('exportexcel')->middleware('auth');
Route::get('/home ', [CashierController::class,'home'])->name('home');
Route::get('/login', [LoginController::class,'login'])->name('login');
Route::post('/loginprocess', [LoginController::class,'loginprocess'])->name('loginprocess');
Route::get('/register ', [LoginController::class,'register'])->name('register');
Route::post('/registeruser', [LoginController::class,'registeruser'])->name('registeruser');
Route::get('/logout', [LoginController::class,'logout'])->name('logout');
Route::post('/bubblesort/{item} ', [CashierController::class,'bubblesort'])->name('bubblesort')->middleware('auth');



