<!doctype html>

<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
        <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>

        <link href="{{asset('css/tutorial.css')}}" rel="stylesheet">

        <title>Modulearn - Create Tutoriallette</title>
    </head>
    <body onload='ready();'>
        @include('partial/header')
        @include('partial/md-editor')
    </body>

</html>