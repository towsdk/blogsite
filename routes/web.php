<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\RouteCompiler;

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

Route::get('/', [Homecontroller::class, 'homepage']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [Homecontroller::class, 'index'])->middleware('auth')->name('home');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::controller(AdminController::class)->group(function(){

    Route::get('/posts', 'posts')->name('posts');
    Route::post('/add-post', 'addpost')->name('add-post');
    Route::get('/showposts', 'showposts')->name('showposts');
    Route::get('/deletepost/{id}', 'deletepost')->name('deletepost');
    Route::get('/editpost/{id}', 'editpost')->name('editpost');
    Route::post('/updatepost/{id}', 'updatepost')->name('updatepost');
    Route::get('/active/{id}', 'active')->name('active');
    Route::get('/reject/{id}', 'reject')->name('reject');
});


Route::get('/details/{id}', [Homecontroller::class, 'details'])->name('details');
Route::get('/userpost', [Homecontroller::class, 'userpost'])->middleware('auth')->name('userpost');
Route::post('/updateUserPost', [Homecontroller::class, 'updateUserPost'])->middleware('auth')->name('updateUserPost');
Route::get('/mypost', [Homecontroller::class, 'mypost'])->middleware('auth')->name('mypost');