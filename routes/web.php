<?php


use App\Livewire\Employees\AddEmploye;
use App\Livewire\Employees\ListEmployes;
use App\Livewire\Employees\Main;
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

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware(['auth', 'verified', 'role:owner'])->group(function () {

      Route::get('/addEmploye',AddEmploye::class)->name('addEmploye');
      Route::get('/listEmployes',ListEmployes::class)->name('listEmployes');
      Route::get('/Employees',Main::class)->name('Employees');
    });

require __DIR__.'/auth.php';
