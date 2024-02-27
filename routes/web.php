<?php


use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\Bookcontroller;
use App\Http\Controllers\ProfileController;

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

Route::get('/',[Bookcontroller::class,'homepage'])->name('home');
Route::get('/books/index',[Bookcontroller::class,'index'])->name('indice');
Route::get('/books/genre',[Bookcontroller::class,'byGenre'])->name('generi');
Route::get('user/books',[Bookcontroller::class,'userBooks'])->name('user.books')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::resource('books',BookController::class);
    Route::get('books.bygenre',[Bookcontroller::class,'byGenre'])->name('books.byGenre');
});



/*Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';*/
