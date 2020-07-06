<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <title>@yield('nome')</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <script src="{{ asset('js/app.js')}}" type="text/javascript"></script>

    @hasSection('javascript')
        @yield('javascript')
    @endif
</head>

<body>
    <header>
        <nav>
            <div class="nav-wrapper blue darken-4">
                <a href="#" data-target="mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="/">Home</a></li>
                    <li><a href="{{route('organizacaos')}}">Organizações</a></li>


                </ul>
                <ul class="sidenav" id="mobile">
                    <li><a href="/">Home</a></li>

                        <li><a href="{{route('organizacaos')}}">Organizações</a></li>

                </ul>
            </div>
        </nav>
    </header>
</body>
</html>
