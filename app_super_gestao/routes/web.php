<?php

use Illuminate\Support\Facades\Route;

/*
Route::get('/', function () {
    return view('welcome');
});
 */

Route::get('/', [\App\Http\Controllers\MainController::class,'main']);

Route::get('/about-us', [\App\Http\Controllers\AboutUsController::class, 'aboutUs']);

Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'contact']);


Route::get(
    '/contact/{name}/{category}/{subject}/{message}',
    function(string $name, string $category, string $subject, string $message) {
        echo 'Estamos aqui: $name - $category - $subject - $message';
    }
);
