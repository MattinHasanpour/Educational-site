<?php
use App\Livewire\Admin\Panel\Index;
use App\Livewire\Admin\User\UserCreate;
use App\Livewire\Admin\User\UserList;
use Illuminate\Support\Facades\Route;

Route::get('/admin',Index::class)->name('panel');
Route::get('/admin/users-creat',UserCreate::class)->name('user-creat');
Route::get('/admin/users-list',UserList::class)->name('user-list');
