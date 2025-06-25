<?php

use App\Http\Controllers\ConcentrationController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\StudyProgramController;
use App\Http\Controllers\StudySystemController;
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

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::middleware(['auth'])->group(
    function () {
        Route::get('/', function () {
            return view('pages.dashboard.index', ['type_menu' => '']);
        })->name('home');

        Route::resource('study-systems', StudySystemController::class);
        Route::resource('study-programs', StudyProgramController::class);
        Route::resource('concentrations', ConcentrationController::class);
    }

);
