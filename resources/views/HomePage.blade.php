@extends('layout.MainLayout')
@section('title', 'Inicio')
@section('content')
    <div
        style="width: 100%; display: flex; justify-content: center;flex-direction: column; 
               min-height: 40vh;background: lemonchiffon;align-items: center;">
        <h1 style="font-style: italic">Seja bem-vindo ao ChatEddy</h1>
        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa-solid fa-plus"></i>
            Criar Grupo</button>
    </div>
    {{-- {{Auth::user()->id}} --}}
    <div style="display: grid;grid-template-columns: 50% 50%">
        <div style="background-color: rgb(147, 191, 228); height: 60vh; border-right: solid 1px rgba(136, 136, 136, 0.664);">
            <h4 style="text-align: center; font-style: oblique; font-weight: bolder;">Grupos Disponiveis</h4>
            <div style="display: flex; justify-content: space-between">
                <div style="display: flex;">
                    <img src="/img/jiraya.webp"
                        style="width: 50px; height: 50px; border-radius: 100px; margin-left: 30px" />
                    <h4 style="margin-left: 20px;">HotakuLand</h4>
                </div>
                <button class="btn btn-success" style="height: 40px; margin-top: 5px;margin-right: 30px;">
                    <i class="fa-solid fa-angles-right"></i>
                    Juntar-se
                </button>
            </div>
        </div>

        <div style="background-color: rgb(147, 191, 228); height: 60vh;">
            <h4 style="text-align: center;font-style: oblique; font-weight: bolder;">Meus Grupos</h4>
            <div style="display: flex; justify-content: space-between">
                <div style="display: flex; cursor: pointer" onclick="window.location='{{ url('/grupil') }}'">
                    <img src="/img/jiraya.webp"
                        style="width: 50px; height: 50px; border-radius: 100px; margin-left: 30px" />
                    <h4 style="margin-left: 20px;">Anime Lovers</h4>
                </div>
                <button class="btn btn-success" style="height: 40px; margin-top: 5px;margin-right: 30px;">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    Sair
                </button>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle">Criando um novo grupo</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/new-group" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nome</label>
                            <input style="box-shadow: none; border: solid black 1px;" type="text" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nome">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Descricao</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" style="box-shadow: none; border: solid black 1px;"
                                placeholder="Descricao" rows="2"></textarea>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Perfil</span>
                            </div>
                            <input type="file" class="form-control" aria-label="Amount (to the nearest dollar)">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
