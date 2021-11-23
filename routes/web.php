<?php
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TicketController;
use GuzzleHttp\Middleware;
use App\Http\Controllers\CheckinController;

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

Route::get('/', [HomeController::class,'index'])->name('home');
Route::post('/daftar', [HomeController::class,'store'])->name('register');

Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'prosesLogin'])->name('loginproses')->middleware('guest');
 
Route::get('/logout',[LoginController::class,'logout'])->name('logout')->middleware('auth');
Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard')->middleware('auth');

Route::get('/tickets',[TicketController::class,'index'])->name('tickets.index')->middleware('auth');
Route::get('/tickets/create',[TicketController::class,'create'])->name('tickets.create')->middleware('auth');
Route::post('/tickets',[TicketController::class,'store'])->name('tickets.store')->middleware('auth');
Route::get('/tickets/{id}',[TicketController::class,'edit'])->name('tickets.edit')->middleware('auth');
Route::post('/tickets/{id}',[TicketController::class,'update'])->name('tickets.update')->middleware('auth');
Route::get('/tickets/{id}/delete',[TicketController::class,'destroy'])->name('tickets.destroy')->middleware('auth');

Route::get('/checkin',[CheckinController::class,'index'])->name('tickets.checkin')->middleware('auth');
Route::post('/checkin',[CheckinController::class,'check'])->name('tickets.check')->middleware('auth');