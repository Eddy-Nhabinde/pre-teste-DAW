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
            @if (isset($grupos))
                @foreach ($grupos as $g)
                    <div style="display: flex; margin-bottom: 20px; cursor: pointer"
                        onclick="window.location='{{ url('/grupil/' . $g->id . '') }}'">
                        <img src="/img/perfis/{{ $g->perfil }}"
                            style="width: 50px; height: 50px; border-radius: 100px; margin-left: 20px" />
                        <h4 style="margin-left: 20px;">{{ $g->nome }}</h4>
                    </div>
                @endforeach
            @endif
        </div>
        <div>
            <div style="display: flex; justify-content: space-between; margin-bottom: -10px;">
                <h4 style="font-weight: bolder; margin-left: 25px; font-size: 17px; text-align: center; color: blue">
                    @if (isset($grupos))
                        {{ $nome }}
                    @endif
                </h4>
                <div class="dropdown">
                    <button class="btn" type="button" id="dropdownMenuButton" style="border: none;"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i style="margin-top: 5px; margin-right: 10px;" class="fa-solid fa-ellipsis-vertical"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="margin-right: 30px">
                        <a class="dropdown-item" href="#">Sair Do Grupo</a>
                        <button data-toggle="modal" class="dropdown-item" data-target="#exampleModalCenter"
                            style="border: none; box-shadow: none;outline: none;">
                            Ver Membros</button>
                    </div>
                </div>
            </div>
            <hr />
            <div style="margin-bottom: 90px;">
                @if (isset($grupos))
                    @foreach ($mensages as $m)
                        <div id="div{{ $m->created_at }}" class="card w-75" style="margin: 10px;">
                            <div style="text-transform: capitalize;" class="card-header">
                                {{ $m->name }}
                            </div>
                            <blockquote class="blockquote mb-0" style=" padding: 5px">
                                <p>{{ $m->mensagem }}</p>
                                <footer class="blockquote-footer" style="font-size: 14px; margin-top: 10px">
                                    {{ $m->created_at }}
                                </footer>
                            </blockquote>
                        </div>

                        @if ($m->uid == @Auth::user()->id)
                            <script>
                                document.getElementById('div{{ $m->created_at }}').style.marginLeft = 'auto'
                            </script>
                        @endif
                    @endforeach
                @endif
                <form class="child" method="POST" action="/message-send/{{ $g_id }}">
                    @csrf
                    <textarea class="form-control" id="exampleFormControlTextarea1" style="box-shadow: none; border: solid black 1px;"
                        placeholder="Escreva Uma Mensagem" rows="3" name="text"></textarea>
                    <button class="btn btn-primary" type="submit"
                        style="margin-left: 10px;height: 50px; margin-right: 10px; margin-top: 15px"><i
                            class="fa-solid fa-paper-plane"></i>Enviar</button>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle">Membros do {{ $nome }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @foreach ($menbros as $m)
                    <h4 style="text-transform: capitalize; margin-left: 20px; font-weight: bold">{{ $m->name }}</h4>
                @endforeach
            </div>
        </div>
    </div>
@endsection
