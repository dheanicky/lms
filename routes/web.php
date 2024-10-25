<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\VideoClaimController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\VideoContentDetailController;
use App\Http\Controllers\ContentDetailController;
use App\Http\Controllers\VideoController;

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
})->name('home');

// Route::get('/shopping-cart', function () {
//     return view('shopping-cart');
// })->name('shopping-cart');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('review', ReviewController::class);
});

require __DIR__.'/auth.php';

// Route untuk autentikasi pengguna
Route::middleware(['auth', 'user'])->group(function(){
    Route::get('dashboard', [UserController::class, 'index'])->middleware('auth', 'checkIfBanned')->name('dashboard');
    Route::get('content', [ContentController::class, 'index'])->name('user.content');
    Route::get('content/{id}', [ContentController::class, 'show'])->name('user.content.show');
    Route::get('/video-claims', [VideoClaimController::class, 'index'])->name('video.claims');
    Route::post('/video-claims/{contentId}', [VideoClaimController::class, 'claim'])->name('video.claim');

    // Rute untuk ShoppingCart
    Route::get('/shoppingcart', [ShoppingCartController::class, 'index'])->name('shoppingcart.index');
    Route::post('/shoppingcart', [ShoppingCartController::class, 'store'])->name('shoppingcart.store');
    Route::delete('/shoppingcart/{id}', [ShoppingCartController::class, 'destroy'])->name('shoppingcart.destroy');
    
});

// Route untuk admin
Route::middleware(['auth', 'admin'])->group(function(){
    Route::get('/admin/dashboard', [UserController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/manage-user', [ManageUserController::class, 'index'])->name('admin.manage-user');
    Route::post('/ban-user/{id}', [ManageUserController::class, 'banUser'])->name('admin.ban-user');
    Route::post('/unban-user/{id}', [ManageUserController::class, 'unbanUser'])->name('admin.unban-user');
    Route::get('/admin/content', [ContentController::class, 'index'])->name('admin.content.index');
    Route::get('/admin/content/create', [ContentController::class, 'create'])->name('admin.content.create');
    Route::post('/admin/content', [ContentController::class, 'store'])->name('admin.content.store');
    Route::get('/admin/content/{id}/edit', [ContentController::class, 'edit'])->name('admin.content.edit');
    Route::put('/admin/content/{id}', [ContentController::class, 'update'])->name('admin.content.update');
    Route::delete('/admin/content/{id}', [ContentController::class, 'destroy'])->name('admin.content.destroy');
    Route::get('/admin/content/{id}', [ContentController::class, 'show'])->name('admin.content.show');
});

Route::get('auth/google', [SocialAuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [SocialAuthController::class, 'handleGoogleCallback']);

Route::get('auth/github', [SocialAuthController::class, 'redirectToGithub'])->name('auth.github');
Route::get('auth/github/callback', [SocialAuthController::class, 'handleGithubCallback']);
