<?php

namespace App\Http\Controllers;

use App\Models\mensagens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MensagensController extends Controller
{
    function getAll($id)
    {
        $mensagens = DB::table('mensagens')
            ->join('grupos', 'grupos.id', '=', 'mensagens.grupos_id')
            ->join('users', 'users.id', '=', 'mensagens.user_id')
            ->select('mensagens.*', 'users.name', 'grupos.nome', 'users.id as uid')
            ->where('grupos.id', $id)
            ->get();

        $menbros = DB::table('user_groups')
            ->join('grupos', 'grupos.id', '=', 'user_groups.grupos_id')
            ->join('users', 'users.id', '=', 'user_groups.user_id')
            ->select('users.name', 'users.email')
            ->where('grupos.id', $id)
            ->get();

        $nome = DB::table('grupos')
            ->select('grupos.nome')
            ->where('grupos.id', $id)
            ->get();

        $users = DB::table('users')
            ->select('users.*')
            ->where('id', Auth::user()->id)
            ->get();

        $controller = new GruposController();
        $meus_grupos = $controller->getAll(1);

        return view('messages', ["mensages" => $mensagens, "grupos" => $meus_grupos, "nome" => $nome[0]->nome, "menbros" => $menbros, "g_id" => $id, "user" => $users]);
    }


    function send($id, Request $request)
    {
        $mensagens = new mensagens();
        $mensagens->mensagem = $request->text;
        $mensagens->user_id = Auth::user()->id;
        $mensagens->grupos_id = $id;

        $mensagens->save();
        return redirect('/grupil/' . $id);
    }
}
