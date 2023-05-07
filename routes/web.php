<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
Route::name("auth.")->controller(AuthController::class)->group(function () {
    Route::get("/login", 'login')->name("login");
    Route::post("/login", 'doLogin');
    Route::delete("/logout", 'logout')->name('logout');
});

Route::prefix("/blog")->name("blog.")->controller(BlogController::class)->group(function () {
    Route::get("/", 'index')->name("index");
    Route::get("/new", "create")->name("create");
    Route::post("/new", 'store')->name("store");
    Route::get("/{post}/edit", 'edit')->name('edit')->middleware('auth');
    Route::patch("{post}/edit", 'update')->name("update");


    Route::get("{slug}-{post}", 'showWithId')->where([
        'post' => '[0-9]+',
        'slug' => '[a-z0-9\-]+'
    ])->name("show.id");

    // Route::get("{post:slug}", 'showWithSlug')->where([
    //     'post' => '[a-z0-9\-]+'
    // ])->name("show.slug");


});