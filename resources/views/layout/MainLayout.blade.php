<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- jsPDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>

    <title>@yield('title')</title>
    <link rel="shortcut icon" href="/img/sd.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css"
        integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

    <!-- W3.CSS -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <!--for multi-select: -->


    <link rel="stylesheet" href="/css/inicial.css">

</head>

<body style="overflow-y: hidden; overflow-x: hidden;">

    <header>
        <nav class="navbar navbar-expand-lg" style="background:  rgba(147, 192, 228, 0.226);">
            <a style="margin-left: 20px" class="navbar-brand" href="#"><i
                    class="fa-regular fa-comments"></i>&nbsp;Chat-Eddy</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

                </ul>
                <form class="form-inline my-2 my-lg-0" style="margin-right: 20px;" method="POST"
                    action="/search-groups">
                    @csrf
                    <input class="form-control mr-sm-2" type="search" name="pesquisa"
                        placeholder="Pesquise por grupos">
                    <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
                    <a style="margin-left: 10px;" href="/" class="btn btn-primary my-2 my-sm-0">Todos</a>
                </form>
                <form class="form-inline my-2 my-lg-0" style="margin-right: 20px;" method="POST"
                    action="/logout">
                    @csrf
                  <a href="/logout" onclick="event.preventDefault(); this.closest('form').submit();" >Sair</a>
                </form>
            </div>
        </nav>
    </header>

    <div class="row" style="overflow: hidden;">
        @if (session()->has('erro'))
            <div style="margin-top: 10px; display:flex; justify-content:center; margin-bottom:10px; margin-bottom:10px">
                <div id="hide-message" class="alert alert-warning alert-dismissible fade show" role="alert"
                    style="width:50%;">
                    {{ session()->get('erro') }}
                </div>
            </div>
        @else
            @if (session()->has('sucesso'))
                <div
                    style="margin-top: 10px; display:flex; justify-content:center; margin-bottom:10px; margin-bottom:10px">
                    <div id="hide-message" class="alert alert-success alert-dismissible fade show" role="alert"
                        style="width:60%;">
                        {{ session()->get('sucesso') }}
                    </div>
                </div>
            @endif
        @endif
        @yield('content')
    </div>

    <script>
        $(".alert").delay(4000).slideUp(200, function() {
            $(this).alert('close');
        });
    </script>
</body>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script src="/js/perfil.js"></script>

</html>
