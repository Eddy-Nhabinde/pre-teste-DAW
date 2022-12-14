<?php

namespace App\Http\Controllers;

use App\Models\grupos;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GruposController extends Controller
{
    function newGroup(Request $request)
    {
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $requestImage = $request->foto;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/perfis'), $imageName);

            try {
                $grupil = new grupos();
                $grupil->nome = $request->nome;
                $grupil->descricao = $request->desc;
                $grupil->perfil = $imageName;
                $grupil->save();
                return redirect()->back()->with('sucesso', 'Grupo criado com sucesso');
            } catch (Exception $e) {
                return redirect()->back()->with('erro', 'Erro na atualizacao do perfil');
            }
        } else {
            return redirect()->back()->with('erro', 'Erro inesperado');
        }
    }


    function getAll($meus = 0)
    {
        $grupos = DB::table('grupos')
            ->leftjoin('user_groups', 'user_groups.grupos_id', '=', 'grupos.id')
            ->select('grupos.*', 'user_groups.user_id', 'user_groups.id as enroll_id')
            ->orderBy('created_at', 'desc')
            ->get();

        $user = DB::table('users')
            ->select('users.*')
            ->where('id', Auth::user()->id)
            ->get();

        $mine = [];
        $nomes = [];
        $counter = 0;
        if (Auth::check()) {
            foreach ($grupos as $grup) {
                if ($grup->user_id == Auth::user()->id) {
                    array_push($mine, $grup);
                    array_push($nomes, $grup->nome);
                }
                foreach ($nomes as $nome) {
                    if ($nome == $grup->nome) {
                        $grupos->forget($counter);
                    }
                }
                $counter++;
            }

            if ($meus == 1) {
                return $mine;
            } else {
                return view('HomePage', ["grupos" => $grupos, "meus" => $mine, "user" => $user]);
            }
        } else {
            return redirect('/login');
        }
    }

    function getThis(Request $request)
    {
        $grupal = DB::table('grupos')
            ->where('nome', 'like', $request->pesquisa . '%')
            ->get();


        $meus = $this->getAll(1);

        $counter = 0;
        foreach ($grupal as $g) {
            foreach ($meus as $meu) {
                if ($g->nome == $meu->nome) {
                    $grupal->forget($counter);
                }
            }
            $counter++;
        }

        return view('HomePage', ["grupos" => $grupal, "meus" => $meus]);
    }
}
