@extends('layout.MainLayout')
@section('title', 'Inicio')
@section('content')
    <div
        style="width: 100%; display: flex; justify-content: center;flex-direction: column; 
               min-height: 40vh;background: lemonchiffon;align-items: center;">
        <h1 style="font-style: italic">Seja bem-vindo ao ChatEddy</h1>
        <button class="btn btn-primary"><i class="fa-solid fa-plus"></i> Criar Grupo</button>
    </div>
    <div style="display: grid;grid-template-columns: 50% 50%">
        <div style="background-color: rgb(147, 191, 228); min-height: 60vh; border-right: solid 1px rgb(150, 150, 150);">
            <h4 style="text-align: center; font-style: oblique; font-weight: bolder;">Grupos Disponiveis</h4>
            <div style="display: flex; justify-content: space-between">
                <div style="display: flex;">
                    <img src="/img/jiraya.webp" style="width: 50px; height: 50px; border-radius: 100px; margin-left: 30px" />
                    <h4 style="margin-left: 20px;">HotakuLand</h4>
                </div>
                <button class="btn btn-outline-primary" style="height: 40px; margin-top: 5px;margin-right: 30px;">
                    <i class="fa-solid fa-angles-right"></i>
                    Juntar-se
                </button>
            </div>
        </div>

        <div style="background-color: rgb(147, 191, 228); min-height: 60vh">
            <h4 style="text-align: center;font-style: oblique; font-weight: bolder;">Meus Grupos</h4>
            <div style="display: flex; justify-content: space-between">
                <div style="display: flex;">
                    <img src="/img/jiraya.webp"
                        style="width: 50px; height: 50px; border-radius: 100px; margin-left: 30px" />
                    <h4 style="margin-left: 20px;">HotakuLand</h4>
                </div>
                <button class="btn btn-outline-primary" style="height: 40px; margin-top: 5px;margin-right: 30px;">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    Sair
                </button>
            </div>
        </div>
    </div>
@endsection
