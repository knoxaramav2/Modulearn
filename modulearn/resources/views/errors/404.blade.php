<!doctype html>

<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{asset('css/err.css')}}" rel="stylesheet">
        <title>404</title>
    </head>
    <body class="err-body">
        @include('partial/header')
        <div class="err-bg">
            <span>This page cannot be found :/</span>
        </div>
    </body>
</html>