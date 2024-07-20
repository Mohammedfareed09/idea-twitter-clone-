<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashBoardConttroller;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileConttroller;
use App\Http\Controllers\UserController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;




Route::get('/dashboard', [DashBoardConttroller::class, 'index'] )->name('dashboard');

Route::post('/idea', [IdeaController::class, 'store'] )->name('idea.create')->middleware('auth');

Route::put('/idea/{idea}', [IdeaController::class, 'update'] )->name('idea.update')->middleware('auth');

Route::get('/idea/{idea}', [IdeaController::class, 'show'] )->name('idea.show');

Route::get('/idea/{idea}/edit', [IdeaController::class, 'edit'] )->name('idea.edit')->middleware('auth');

Route::delete('/idea/{idea}', [IdeaController::class, 'destroy'] )->name('idea.delete')->middleware('auth');

Route::post('/idea/{idea}/comments', [CommentController::class, 'store'] )->name('idea.comments.store')->middleware('auth');

Route::get('/register', [AuthController::class, 'register'] )->name('register');

Route::post('/register', [AuthController::class, 'store'] );

Route::get('/login', [AuthController::class, 'login'] )->name('login');

Route::post('/login', [AuthController::class, 'authenticate'] );

Route::post('/logout', [AuthController::class, 'logout'] )->name('logout');

Route::resource('users', UserController::class)->only('show' ,'edit' ,'update')->middleware('auth');

Route::get('profile', [UserController::class,'profile'] )->middleware('auth')->name('profile');


Route::get('/terms',function(){
    return view('terms');
});

