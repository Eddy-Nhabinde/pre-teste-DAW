@extends('layout.MainLayout')
@section('title', 'Inicio')
@section('content')

    <style>
        hr {
            margin-top: 1rem;
            margin-bottom: 1rem;
            border: 0;
            border-top: 1px solid rgba(0, 0, 0);
        }

        .child {
            width: 70%;
            position: fixed;
            bottom: 0;
            display: flex;
            justify-content: center;
        }
    </style>

    <div style="display: grid; grid-template-columns: 30% 70%;position: relative; overflow: hidden; ">
        <div style="background-color: rgba(152, 197, 233, 0.685); min-height:92vh;">
            <h4 style="font-style: oblique; font-weight: bolder; margin-left: 25px; font-size: 17px;">Lista de Grupos
            </h4>
            <hr />
            <div style="display: flex;">
                <img src="/img/jiraya.webp" style="width: 50px; height: 50px; border-radius: 100px; margin-left: 20px" />
                <h4 style="margin-left: 20px;">Anime Lovers</h4>
            </div>
        </div>
        <div>
            <div style="display: flex; justify-content: space-between; margin-bottom: -10px;">
                <h4 style="font-weight: bolder; margin-left: 25px; font-size: 17px; text-align: center">Anime Lovers</h4>
                <div class="dropdown">
                    <button class="btn" type="button" id="dropdownMenuButton" style="border: none;"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i style="margin-top: 5px; margin-right: 10px;" class="fa-solid fa-ellipsis-vertical"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="margin-right: 30px">
                        <a class="dropdown-item" href="#">Sair Do Grupo</a>
                        <a class="dropdown-item" href="#">Ver Membros</a>
                    </div>
                </div>
            </div>
            <hr />
            <div style="overflow: hidden">
                <div class="card w-75" style="margin: 10px;">
                    <div class="card-header">
                        Biote Ngovene
                    </div>
                    <blockquote class="blockquote mb-0" style=" padding: 5px">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        <footer class="blockquote-footer" style="font-size: 14px; margin-top: 10px">17/02/2023 17:04
                        </footer>
                    </blockquote>
                </div>
                <div class="card w-75" style="margin: 10px;">
                    <div class="card-header">
                        Biote Ngovene
                    </div>
                    <blockquote class="blockquote mb-0" style=" padding: 5px">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        <footer class="blockquote-footer" style="font-size: 14px; margin-top: 10px">17/02/2023 17:04
                        </footer>
                    </blockquote>
                </div>
                <div class="card w-75" style="margin: 10px;">
                    <div class="card-header">
                        Biote Ngovene
                    </div>
                    <blockquote class="blockquote mb-0" style=" padding: 5px">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        <footer class="blockquote-footer" style="font-size: 14px; margin-top: 10px">17/02/2023 17:04
                        </footer>
                    </blockquote>
                </div>
                <div class="card w-75" style="margin: 10px;">
                    <div class="card-header">
                        Biote Ngovene
                    </div>
                    <blockquote class="blockquote mb-0" style=" padding: 5px">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        <footer class="blockquote-footer" style="font-size: 14px; margin-top: 10px">17/02/2023 17:04
                        </footer>
                    </blockquote>
                </div>
                <div class="card w-75" style="margin: 10px;">
                    <div class="card-header">
                        Biote Ngovene
                    </div>
                    <blockquote class="blockquote mb-0" style=" padding: 5px">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        <footer class="blockquote-footer" style="font-size: 14px; margin-top: 10px">17/02/2023 17:04
                        </footer>
                    </blockquote>
                </div>
                <div class="card w-75" style="margin: 10px;">
                    <div class="card-header">
                        Biote Ngovene
                    </div>
                    <blockquote class="blockquote mb-0" style=" padding: 5px">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        <footer class="blockquote-footer" style="font-size: 14px; margin-top: 10px">17/02/2023 17:04
                        </footer>
                    </blockquote>
                </div>
                <div class="child">
                    <textarea class="form-control" id="exampleFormControlTextarea1" style="box-shadow: none; border: solid black 1px;"
                        placeholder="Escreva Uma Mensagem" rows="3"></textarea>
                    <button class="btn btn-primary"
                        style="margin-left: 10px;height: 50px; margin-right: 10px; margin-top: 15px"><i
                            class="fa-solid fa-paper-plane"></i>Enviar</button>
                </div>
            </div>
        </div>
    </div>

@endsection
