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

        <div id='topic-create-editor'>
            <div><input type="text" id='topic-create-title' placeholder="Title"></input></div>
            <div class='container-side-by-side'>
                <div class='container-left' id='topic-editor-text'>
                    <textarea></textarea>
                </div>
                <div class='container-right' id='topic-editor-toolbox'>
                    <span>hello</span>
                </div>
            </div>
            <div>
                <span>footer</span>
            </div>
        </div>

    </body>
    <script>
    
    var converter = new showdown.Converter();

    function ready(){
    
    }

    </script>

</html>