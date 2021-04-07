<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MedeX</title>

       	<!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display" rel="stylesheet"> 

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
        
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Playfair+Display', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">INICIAR</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">REGISTRARSE</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
            
                <div class="col">
                    <div class="title m-b-md">
                        MedeX
                    </div>
                </div>
                <div class="col ">
                        <img src="../LOGO.png" alt="LOGO SANATORIO MUÑOA">
                </div>    
            </br>
            </br>
            </br>


                <a href="{{route('Equipos.index')}}" class="btn btn-outline-secondary" role="button" >Equipos</a>
                <a href="{{route('Solicitud.index')}}" class="btn btn-outline-secondary" role="button" >Solicitud de mantenimiento</a>
            </div>
        </div>
    </body>
</html>