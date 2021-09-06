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
    return redirect()->back();
})->name('/lang');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/register',function(){
    $routeParameter = 'Contacts/create';
    return view('insertContact',compact('routeParameter'));
})->name('/register');

Route::post('Contacts/create', 'ContactController@create');

Route::get('/edit',function(){
    $routeParameter = '/update';
    return view('editContact',compact('routeParameter'));
})->name('/edit');

Route::post('Contacts/{contact}', 'ContactController@update');

Route::get('/cancel',function(){
    return redirect('home');
})->name('/cancel');