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


    function getAll()
    {
        $grupos = DB::table('grupos')
            ->join('user_groups', 'user_groups.grupos_id', '=', 'grupos.id')
            ->select('grupos.*')
            ->orderBy('created_at', 'desc')
            ->get();
            dd($grupos);

        return view('HomePage', ["grupos" => $grupos]);
    }
}
