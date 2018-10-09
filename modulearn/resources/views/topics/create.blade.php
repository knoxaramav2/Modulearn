<!doctype html>

<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script 'text/javascript' src='{{URL::asset('js/showdown-master/src/showdown.js')}}'></script>

        <title>Modulearn - Create Tutoriallette</title>
    </head>
    <body onload='ready();'>
        @include('partial/header')

        <div class="content">
            <h1>Create New Tutoriallette</h1>

            <div>
                <form>

                </form>
            </div>
        </div>
    </body>
    <script>
    
    var converter = new showdown.Converter();

    function ready(){
    
    }

    </script>

</html>