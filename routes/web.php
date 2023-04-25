<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NominatifController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PensiunController;
use App\Http\Controllers\RegisterController;

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
    return view('admin.login');
});
Route::get('register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');
Route::get('login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'authenticate']);

Route::middleware('auth')->group(function(){
    
    // Route::get('dashboard', function () {
    //     return view('admin.dashboard');
    // });
    Route::get('dashboard',[PagesController::class, 'index']);
    
    Route::get('biodata',[BiodataController::class, 'index']);
    
    
    Route::post('store',[BiodataController::class, 'store']);
    Route::get('add',[BiodataController::class, 'create']);
    
    
    Route::get('detail/{biodata}',[BiodataController::class, 'show']);

    Route::get('edit/{biodata}',[BiodataController::class, 'edit']);
    Route::patch('update/{biodata}',[BiodataController::class, 'update']);
    
    Route::delete('delete/{biodata}',[BiodataController::class, 'destroy']);
    
    Route::get('pensiun',[PensiunController::class, 'index']);
    Route::post('logout', [LoginController::class, 'logout']);
    //Route::get('filter/{biodata}',[PensiunController::class, 'filter']);
    // Route::get('nominatif',[NominatifController::class, 'index']);
    // Route::get('pensiunalami', function () {
    //     return view('admin.pensiun.pensiunalami');
    // });
    // Route::get('pensiundini', function () {
    //     return view('admin.pensiun.pensiundini');
    // });
    // Route::get('pensiunmeninggal', function () {
    //     return view('admin.pensiun.pensiunmeninggal');
    // });
    // Route::get('pensiundudajanda', function () {
    //     return view('admin.pensiun.pensiundudajanda');
    // });
    // Route::get('rekappensiun', function () {
    //     return view('admin.reports.rekappensiun');
    // });
    Route::get('400_badrequest', function () {
        return view('404');
    });

});





