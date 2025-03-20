<?php




use App\Http\Controllers\UsersController;
use App\Livewire\Employees\Main;
use App\Livewire\Roles\Index;
use App\Livewire\Roles\Show;
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
    ->middleware(['auth:admin,web', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth:admin,web', 'verified'])
    ->name('profile');

Route::middleware(['auth:admin,web', 'verified'])->group(function () {
      Route::get('/products',\App\Livewire\Products\Index::class)->name('products');
      Route::get('/addEmployee',\App\Livewire\Employees\Create::class)->name('addEmploye');
      Route::get('/listEmployes',\App\Livewire\Employees\Index::class)->name('listEmployes');
      Route::get('/editEmployee/{idUser}',\App\Livewire\Employees\Show::class)->name('EditEmployee');
      Route::get('/listProducts',\App\Livewire\Products\Index::class)->name('listProducts');
      Route::get('/addProduct',\App\Livewire\Products\Index::class)->name('addProduct');
      Route::get('/roles',Index::class)->name('roles.index');
      Route::get('/roles/{role_id}',Show::class)->name('roles.show');


    });
    
require __DIR__.'/auth.php';
