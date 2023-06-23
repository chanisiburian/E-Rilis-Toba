<?php

namespace App\Http\Controllers;


use App\Http\Middleware\AuthAccess;
use App\Http\Middleware\isLogin;
use App\Http\Middleware\RoleAccessAdmin;
use App\Http\Middleware\RoleAccessUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::middleware(AuthAccess::class)->group(function(){

    Route::get('login', [AuthController::class, 'view_login'])->name('auth.login');
    Route::post('login',[AuthController::class,'login'])->name('login');

    Route::get('register', [AuthController::class, 'view_register'])->name('auth.register');

    Route::get('forgot-password', [AuthController::class, 'view_forgot_password'])->name('auth.forgot-password');
    Route::post('post-forgot-password',[AuthController::class,'post_forgot_password'])->name('forgot-password');

    Route::get('recovery-password', [AuthController::class, 'view_recovery_password'])->name('auth.recovery-password');
    Route::post('post-recovery-password',[AuthController::class,'post_recovery_password'])->name('recovery-password');

});

Route::get('', [BeritaController::class, "homepage"]);
Route::get('/berita', [BeritaController::class, "berita"]);


Route::middleware(RoleAccessAdmin::class)->group(function(){

    Route::get('admin', [BeritaController::class, 'index'])->name('admin');
    Route::get('admin/user', [UserController::class, 'index'])->name('admin.user');
    Route::get('admin/profile', [UserController::class, "profile"])->name("admin.profile");
    Route::get('admin/profile', [UserController::class, "profile"])->name("admin.profile");

});

Route::middleware(RoleAccessUser::class)->name('user.')->group(function(){
    
    Route::get('user', [BeritaController::class, "dashboard"])->name('index');
    Route::get('user/berita', [BeritaController::class, "index"])->name('berita');
    Route::get('user/verifikasi', [UserController::class, "verifikasi"])->name('verifikasi');
    Route::get('user/profile', [UserController::class, "profile"])->name("profile");

});

Route::get('logout', function(){
    Auth::logout();
    return redirect('');
});

Route::middleware(isLogin::class)->group(function(){
    // BERITA
    Route::post('berita/add', [BeritaController::class, "add"])->name("berita.add");
    Route::post('berita/update/{id}', [BeritaController::class, "update"])->name("berita.update");
    Route::post('berita/delete/{id}', [BeritaController::class, "delete"])->name("berita.delete");

    // USER
    Route::post('user/update/{id}', [UserController::class, "update"])->name("user.update");
    Route::post('user/delete/{id}', [UserController::class, "delete"])->name("user.delete");
});
    Route::post('user/add', [UserController::class, "add"])->name("user.add");
