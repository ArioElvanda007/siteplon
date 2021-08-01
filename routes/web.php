<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;//import controller DashboardController
use App\Http\Controllers\MasterProfileController;//import controller MasterProfileController
use App\Http\Controllers\MasterUserController;//import controller MasterUserController
use App\Http\Controllers\MasterRentalController;//import controller MasterRentalController
use App\Http\Controllers\CommentController;//import controller CommentController

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [DashboardController::class, 'index']);//default home
Route::get('/bekasi', [DashboardController::class, 'bekasi']);//default bekasi
Route::get('/jakarta', [DashboardController::class, 'jakarta']);//default jakarta

// Route::post('/stores_likeBestAll', 'DashboardController@store_likeBestAll');
Route::get('/stores_likeBestAll/{id}', [DashboardController::class,'store_likeBestAll'])->name('likeBestAll.store_likeBestAll');// memanggil halaman edit akses & tampilkan id nya
Route::get('/detail/{id}', [DashboardController::class,'profile'])->name('detail.show');// memanggil halaman edit akses & tampilkan id nya
Route::post('/detail/storecomment', [DashboardController::class,'store_comment'])->name('detail.storecomment');// memanggil fungsi store
Route::post('/detail/storerating', [DashboardController::class,'store_rating'])->name('detail.storerating');// memanggil fungsi store
// Route::get('/share-social', [DashboardController::class,'shareSocial']);

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

//membuat group route
Route::group(['middleware' => ['auth:sanctum', 'verified']], function(){//apabila sudah login bisa akses dashboard, apabila belum maka kembali ke login
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');//default

    Route::get('/master/profile', [MasterProfileController::class, 'index'])->name('profile.index');// memanggil halaman index
    Route::get('/profile/create', [MasterProfileController::class,'create'])->name('profile.create');// memanggil halaman create
    Route::post('/profile/store', [MasterProfileController::class,'store'])->name('profile.store');// memanggil fungsi store
    Route::get('/profile/edit', [MasterProfileController::class,'edit'])->name('profile.edit');// memanggil halaman edit
    Route::post('/profile/update', [MasterProfileController::class,'update'])->name('profile.update');// memanggil fungsi update

    Route::get('/master/user', [MasterUserController::class,'index'])->name('user.index');// memanggil halaman user
    Route::post('/user/store', [MasterUserController::class,'store'])->name('user.store');// memanggil fungsi store
    Route::post('/user/update', [MasterUserController::class,'update'])->name('user.update');// memanggil fungsi update & tampilkan id nya
    Route::get('/user/delete', [MasterUserController::class,'destroy'])->name('user.delete');// memanggil halaman delete article & tampilkan id nya

    Route::get('/master/rental', [MasterRentalController::class, 'index'])->name('rental.index');// memanggil halaman index
    Route::get('/rental/create', [MasterRentalController::class,'create'])->name('rental.create');// memanggil halaman create
    Route::post('/rental/store', [MasterRentalController::class,'store'])->name('rental.store');// memanggil fungsi store
    Route::get('/rental/edit/{id}', [MasterRentalController::class,'edit'])->name('rental.edit');// memanggil halaman edit
    Route::post('/rental/update', [MasterRentalController::class,'update'])->name('rental.update');// memanggil fungsi update
    Route::get('/rental/delete', [MasterRentalController::class,'destroy'])->name('rental.delete');// memanggil fungsi delete

    Route::get('/admin/comment/{id}', [CommentController::class,'show'])->name('comment.show');// memanggil halaman edit akses & tampilkan id nya
    Route::post('/admin/comment/store', [CommentController::class,'store'])->name('comment.store');// memanggil fungsi store

});
