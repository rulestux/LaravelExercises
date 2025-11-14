<?php

use Illuminate\Support\Facades\Route;

// ORIGINAL:
/*Route::get('/', function () {
    return view('welcome');
});
 */

// ROTAS:
// as rotas direcionam para os 'controllers' e os 'controllers' redirecionam
// as requisições para a 'resources/views/site/';
// rotas nomeadas com o método '->name()':
Route::get('/', [\App\Http\Controllers\MainController::class,'main'])->name('site.index');

Route::get('/about-us', [\App\Http\Controllers\AboutUsController::class, 'aboutUs'])->name('site.about-us');

Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'contact'])->name('site.contact');

Route::get('/login', function(){ return 'Login'; })->name('site.login');

// incluindo prefixo e agrupando rotas:
Route::prefix('/private')->group(function() {
Route::get('/clients', function(){ return 'Clientes'; })->name('private.clients');

Route::get('/suppliers', function(){ return 'Fornecedores'; })->name('private.suppliers');

Route::get('/products', function(){ return 'Produtos'; })->name('private.products');
});

// PARÂMETROS:
//
// usa-se '?' para indicar ao Laravel que o parâmetro é opcional; atribuem-se
// valores padrões na função de 'callback' para que não fiquem vazios, caso
// não sejam preenchidos pelo usuário final:
/*Route::get(
    '/contact/{name?}/{category?}/{subject?}/{message?}',
//    // função de 'callback' com valores padrões:
    function(
        string $name = 'Unknown',
        string $category = 'Information',
        string $subject = 'Contact',
        string $message = 'Message not written'
    ) {
        echo "Estamos aqui: $name - $category - $subject - $message";
    }
);
*/

// EXPRESSÕES REGULARES EM PARÂMETROS:
// estabelecimento de condições para a entrada de parâmetros.
/*Route::get(
    //
    '/contact/{name}/{category_id}/',
    // função de 'callback' com valores padrões:
    function(
        string $name = 'Unknown',
        int $category_id = 1 // 1 - Information
    ) {
        echo "Estamos aqui: $name - $category_id";
    }
// expressão regular para indicar que 'category_id' precisa receber um valor
// numérico entre 0 e 9; com '+' se indica que ele precisa de ao menos um
// caractere; a seguir, expressão regular para indicar que 'name' ficará
// restrita a receber letras na string:
)->where('category_id', '[0-9]+')->where('name', '[A-Za-z]+');
 */

// REDIRECIONAMENTO DE ROTAS:
Route::get('/route1', function() {
    echo 'Rota 1';
})->name('site.route1');

// redirecionamento com o método 'redirect' da classe 'Route':
Route::redirect('/route2', 'route1');

// redirecionamento dentro da função de callback:
Route::get('/route3', function() {
    return redirect()->route('site.route1');
})->name('site.route3');

// ROTA DE CONTINGÊNCIA (FALLBACK):
// trata-se de uma rota para onde se convergirá todo caminho não encontrado
// inserido pelo usuário.
Route::fallback(function() {
    echo 'A página acessada não existe. <a href="'.route('site.index').'">Clique aqui</a> e volte para a página principal.';
});
