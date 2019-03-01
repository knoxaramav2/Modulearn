<!doctype html>

<html lang="{{ app()->getLocale() }}">
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
        <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
        <link href="{{asset('css/tutorial.css')}}" rel="stylesheet">
    </head>
    <body onload='ready();loadHidden();'>
        @include('partial/header')
        @include('partial/md-editor')
    </body>

    <script>

    function loadHidden(){
        smde = getMdEditor();

        Http = new XMLHttpRequest();
        Http.open("GET", "/api/topics/get_tutorial/"+"{{$content->id}}/true");
        Http.send();

        let depQueue = [];

        let title = document.getElementsByName('title')[0];

        Http.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200){
                let depObj = JSON.parse(Http.responseText);
                title.value = depObj.title;
                smde.value(depObj.content);
                document.getElementById('diff-slider').value=depObj.difficulty;
                update_slider(depObj.difficulty);
                console.log(depObj);

                for(let d of depObj.dependencies){
                    addDependency(d.id);
                }
            }                
        }
    }
    </script>
</html>