<?php




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



Route::view('/', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware(['auth', 'verified'])->group(function () {
      Route::get('/products',\App\Livewire\Products\Index::class)->name('products');
      Route::get('/addEmployee',\App\Livewire\Employees\Create::class)->name('addEmploye')->can('notifications', \App\Models\User::class);
      Route::get('/listEmployes',\App\Livewire\Employees\Index::class)->name('listEmployes')->can('view_users', \App\Models\User::class);
      Route::get('/editEmployee/{idUser}',\App\Livewire\Employees\Show::class)->name('EditEmployee');
    });

require __DIR__.'/auth.php';
