<!doctype html>

<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{asset('css/err.css')}}" rel="stylesheet">
        <title>Error</title>
    </head>
    <body>
        @include('partial/header')
        <span>{{$msg}}</span>
    </body>

</html>