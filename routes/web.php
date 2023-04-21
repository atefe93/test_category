<?php


use App\Http\Controllers\Admin\CategoryController;

use App\Http\Controllers\Site\HomeController;
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


Route::get('/',[HomeController::class,'index'])->name('site.index');
Route::get('/logout',[HomeController::class,'logout'])->name('logout');


Route::prefix('admin-panel/management')->name('admin.')->middleware('auth')->group(function () {

    Route::resource('categories', CategoryController::class);

});
