<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function main() {
        // redirecionamento para as views, onde estão
        // os códigos HTML, com o método 'view()'
        // que indica ao Laravel o diretório 'resources/views':
        return view('site.main');
    }
}
