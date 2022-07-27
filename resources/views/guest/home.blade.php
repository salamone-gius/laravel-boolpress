<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Front Office</title>

        {{-- linko il foglio di stile relativo alla gestione frontend --}}
        <link rel="stylesheet" href="{{asset('css/front.css')}}">
    </head>
    <body>

        {{-- monto l'app che renderizzerà la parte frontend --}}
        <div id="app">
            {{-- Vue.js --}}
        </div>

        {{-- linko il file js relativo alla gestione frontend --}}
        <script src="{{asset('js/front.js')}}"></script>
    </body>
</html>