<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Livewire\CreatePost;
use App\Livewire\Search;
use App\Livewire\Profile;
use App\Livewire\Chat;
use App\Livewire\Payment;
use App\Livewire\ScheduleLocker;
use App\Livewire\Report;

Route::view('/', 'welcome');

Route::get('/post/{id}', [PostController::class, 'show'])->name('post.show');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/profile', Profile::class)
    ->middleware(['auth'])
    ->name('profile');

    /*
Route::view('createpost', 'createpost')
    ->middleware(['auth'])
    ->name('createpost');
*/
Route::get('/createpost', CreatePost::class)
    ->middleware(['auth'])
    ->name('createpost');

Route::get('/search', Search::class)
    ->middleware(['auth'])
    ->name('search');

Route::get('/chat', Chat::class)
    ->middleware(['auth'])
    ->name('chat');

Route::get('/schedulelocker', ScheduleLocker::class)
    ->middleware(['auth'])
    ->name('schedulelocker');

Route::get('/payment', Payment::class)
    ->middleware(['auth'])
    ->name('payment');

Route::get('/report', Report::class)
    ->middleware(['auth'])
    ->name('report');
    
require __DIR__.'/auth.php';
