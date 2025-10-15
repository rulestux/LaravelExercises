<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function aboutUs() {
        // redirecionamento para as views, onde estão
        // os códigos HTML, com o método 'view()'
        // que indica ao Laravel o diretório 'resources/views':
        return view('site.about-us');
    }
}
