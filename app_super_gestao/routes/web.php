<?php

use Illuminate\Support\Facades\Route;

/*
Route::get('/', function () {
    return view('welcome');
});
 */
// as rotas direcionam para os 'controllers' e os 'controllers' redirecionam
// as requisições para a 'resources/views/site/':
Route::get('/', [\App\Http\Controllers\MainController::class,'main']);

Route::get('/about-us', [\App\Http\Controllers\AboutUsController::class, 'aboutUs']);

Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'contact']);

// usa-se '?' para indicar ao Laravel que o parâmetro é opcional; atribuem-se
// valores padrões na função de 'callback' para que não fiquem vazios, caso
// não sejam preenchidos pelo usuário final:
Route::get(
    '/contact/{name?}/{category?}/{subject?}/{message?}',
    // função de 'callback':
    function(
        string $name = 'Unknown',
        string $category = 'Information',
        string $subject = 'Contact',
        string $message = 'Message not written'
    ) {
        echo "Estamos aqui: $name - $category - $subject - $message";
    }
);
