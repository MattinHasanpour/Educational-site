<?php


use App\Livewire\Front\CourseDetails;
use App\Livewire\Front\Courses;
use App\Livewire\Front\Home;
use App\Livewire\Admin\Panel\Index;
use App\Livewire\Admin\User\UserCreate;
use App\Livewire\Admin\User\UserList;
use Illuminate\Support\Facades\Route;

Route::get('/',Home::class)->name('home');
Route::get('/courses',Courses::class)->name('courses');
Route::get('/course_details',CourseDetails::class)->name('course.details');

Route::get('/admin',Index::class)->name('panel')
    ->middleware(['auth']);
Route::get('/admin/users-creat',UserCreate::class)->name('user-creat')
    ->middleware(['auth']);
Route::get('/admin/users-list',UserList::class)->name('user-list')
    ->middleware(['auth']);

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
