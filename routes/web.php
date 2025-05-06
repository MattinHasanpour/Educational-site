<?php

use App\Livewire\Admin\Panel\Index;
use App\Livewire\Admin\User\UserCreate;
use App\Livewire\Admin\User\UserList;
use App\Livewire\Front\CourseDetails;
use App\Livewire\Front\Courses;
use App\Livewire\Front\Home;
use Illuminate\Support\Facades\Route;

Route::get('/',Home::class)->name('home');
Route::get('/courses',Courses::class)->name('courses');
Route::get('/course_details',CourseDetails::class)->name('course.details');

Route::get('/admin',Index::class)->name('panel');
Route::get('/admin/users-creat',UserCreate::class)->name('user-creat');
Route::get('/admin/users-list',UserList::class)->name('user-list');
