<!doctype html>

<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ERROR</title>
    </head>
    <body>
    
        @include('partial/header')

        <div class="content">
            <h1>Hmmm....</h1>
            <h3>{{$msg}}</h3>
        </div>

    </body>
</html>