<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/lang',function(){
    if(app()->getLocale() == 'en'){
        session(['language' => 'pt_BR']);
    }else{
        session(['language' => 'en']);
    }
    return redirect('home');
})->name('/lang');

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('/register',function(){
    return view('insertContact');
})->name('/register');

Route::get('/edit',function(){
    return view('editContact');
})->name('/edit');