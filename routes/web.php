<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
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
    // app()->setLocale(session('language'));
    App::setLocale(session('language'));
    // return redirect('home');
    return response()->json(session('language'));
})->name('/lang');

Route::get('/home', [HomeController::class, 'index'])->name('home');
