<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MensagensController extends Controller
{
    function getAll($id)
    {
        $mensagens = DB::table('mensagens')
            ->join('grupos', 'grupos.id', '=', 'mensagens.grupos_id')
            ->join('users', 'users.id', '=', 'mensagens.user_id')
            ->select('mensagens.*', 'users.name', 'grupos.nome')
            ->where('grupos.id', $id)
            ->get();

        $nome = DB::table('grupos')
        ->select('grupos.nome')
        ->where('grupos.id', $id)
        ->get();

        $controller = new GruposController();
        $meus_grupos = $controller->getAll(1);

        return view('messages', ["mensages" => $mensagens, "grupos" => $meus_grupos, "nome" => $nome[0]->nome]);
    }
}
