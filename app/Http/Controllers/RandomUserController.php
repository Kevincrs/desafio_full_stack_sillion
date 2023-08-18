<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http; // Importa a Facade Http para fazer requisições HTTP
use Yajra\DataTables\Facades\DataTables; // Importa a Facade DataTables para uso posterior

class RandomUserController extends Controller
{
    public function getRandomData()
    {
        // Faz a requisição à API e obtém a resposta JSON
        $response = Http::get('https://random-data-api.com/api/v2/users?size=100');
        $random_users = $response->json(); // Converte a resposta JSON em um array associativo

        // Retorna a view 'random_users.index' e passa os dados dos usuários aleatórios para a view
        return view('random_users.index', compact('random_users'));
    }

    public function index()
    {
        // Retorna a view 'random_users.index' sem passar nenhum dado para ela
        return view('random_users.index');
    }
}
