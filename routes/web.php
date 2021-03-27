<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;

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

/*Route::get('/', function () {
    return view('home.index');
})->name('home');

/*Route::get('/store', function () {
    return view('home.store');
})->name('store');*/

/*Route::get('/store', function () {
    return view('home.store');
});*/

Auth::routes(['verify' => true]);

Route::get('/store', [App\Http\Controllers\HomeController::class, 'store'])->name('store');

Route::get('/store/category-{cat_id}/{id}', [App\Http\Controllers\Admin\ProductController::class, 'show'])->name('product');

Route::get('/store/category-{cat_id}', [App\Http\Controllers\Admin\CategoryController::class, 'show'])->name('categories');

//Route::get('/{cat_id}/{id}', function () {
//    return view('product.show');
//})->name('product');

Route::get('/', [App\Http\Controllers\HomeController::class, 'main_page'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'profile'])->middleware('verified')->name('profile_home');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'profile'])->middleware('verified')->name('profile_home');

//Section Email Verification------------------------------------------------------------------------------------------------
Route::get('/email/verify', function () {
    return view('verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/profile', function () {
    // Only verified users may access this route...
})->middleware('verified');
//End section Email Verification---------------------------------------------------------------------------------------------------

Route::middleware(['role:admin'])->prefix('admin_panel')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('homeAdmin');

    Route::get('/admin_panel', [App\Http\Controllers\Admin\HomeController::class, 'admin_panel'])->name('admin_panel');

    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
});
