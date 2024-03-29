<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AuthenticationController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PatnerController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\ResumeController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('blogs', [HomeController::class, 'blog'])->name('blogs');
Route::get('single-blog/{slug}', [HomeController::class, 'singleBlog'])->name('single-blog');

Route::post('contact', [ContactController::class, 'contactStore'])->name('contact.store');
// ******** Admin panel Route ********
Route::get('admin', [AuthenticationController::class, 'login'])->name('login');
Route::post('admin', [AuthenticationController::class, 'authCheck'])->name('login.check');

Route::middleware('auth')->group( function () {

    Route::get('about', [AboutController::class, 'edit'])->name('about.edit');
    Route::put('about/{about}', [AboutController::class, 'update'])->name('about.update');
    
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('logout', [AuthenticationController::class, 'logout'])->name('logout');
    Route::put('/admin', [AuthenticationController::class, 'passwordUpdate'])->name('password.change');

    Route::get('profile', [AuthenticationController::class, 'profile'])->name('profile');
    Route::put('profile', [AuthenticationController::class, 'profileUpdate'])->name('profile.update');

    Route::resource('category', CategoryController::class)->except('create', 'show');

    Route::resource('portfolio', PortfolioController::class)->except('show');

    Route::resource('service', ServiceController::class)->except('show', 'create');
    Route::resource('patner', PatnerController::class)->except('show', 'create');

    Route::resource('resume', ResumeController::class)->except('show');

    Route::resource('blog', BlogController::class);
    
    Route::get('contacts', [ContactController::class, 'index'])->name('contact.index');
    Route::get('get_contact/{id}', [ContactController::class, 'showContact']);
});