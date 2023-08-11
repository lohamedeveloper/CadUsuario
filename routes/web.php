<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\{  
    AuthControllerView,
    AuthControllerLogin,
    AuthControllerLogout
};
use App\Http\Controllers\User\ {
    UserControllerLists,
    UserControllerAdd,
    UserControllerDelete
};

use App\Http\Controllers\Contact\ {
    ContactControllerAdd
};

use App\Http\Controllers\HomeController;

Route::get('/', [AuthControllerView::class, 'index'])->name('Viewlogin');
Route::post('login', [AuthControllerLogin::class, 'login'])->name('login'); 
Route::get('logout', [AuthControllerLogout::class, 'logout'])->name('logout');

Route::get('home',[HomeController::class, 'index']);

Route::get('users', [UserControllerLists::class, 'index']);
Route::post('users-add', [UserControllerAdd::class, 'index']);
Route::get('users-delete', [UserControllerDelete::class, 'index']);
Route::get('user', [UserControllerFindById::class, 'index']);

Route::post('phone-add', [ContactControllerAdd::class, 'index']);
