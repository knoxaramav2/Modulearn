<!doctype html>

<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Modulearn - {{$content->title}}</title>
    </head>
    <body onload="setup({{$content->dependencies}}, {{$content->difficulty}});">
        @include('partial/header')

        <div class='gadget-panel'>
            <div class='gadget-container gadget-right'>
                <span id='adjuster-content'>Content Adjuster</span>
                <input type='range' id='adjuster' min='1' max='10' value='7' oninput="update_slider(this.value);";>
                <button onclick='toggleFavorite(this, {{$content->id}})' class='favorite-neg' id='fav'>
                    <img src="{{asset('images/star.png')}}" alt="Placeholder" height="16" width="16">
                </button>
            </div>
        </div>

        <section id='tutorial-space'>
            <div class='tutorial-block'>
                <div class='tutorial-title'>
                    <span>ID : {{$content->id}}</span>
                    <h1>{{$content->title}} ({{$content->difficulty}})</h1>
                </div>
                <div class='tutorial-body'>
                    @markdown($content->content)
                </div>
            </div>
        </section>
    </body>
</html>

<script>

    var lookup = [];
    var maxDiff = 0;
    var adjuster;
    var adjusterContent;

    function toggleFavorite(obj, id){
        obj.classList.toggle('favorite-neg');
    }

    function setup(dependencies, initDiff){
        adjuster=document.getElementById('adjuster');
        adjusterContent=document.getElementById('adjuster-content');
        maxDiff=initDiff;

        adjustSlider();
        loadDependencyAsync(dependencies);
    }

    function adjustSlider(){
        adjuster.max=maxDiff;
        adjuster.value=maxDiff;
        adjusterContent.innerHTML = "Difficulty Adjuster ("+adjuster.value+")";
    }

    function appendDepContent(depObj){

        maxDiff = depObj.difficulty > maxDiff? depObj.difficulty : maxDiff;

        //generate tutorial block divs
        let tutorial_space = document.getElementById('tutorial-space');
        let tutorial_block = document.createElement('div');
        let tutorial_title = document.createElement('div');
        let tutorial_body = document.createElement('div');
        let id_span = document.createElement('span');
        let title_span = document.createElement('h1');

        //assign classes
        tutorial_block.classList.add('tutorial-block');
        tutorial_title.classList.add('tutorial-title');
        tutorial_body.classList.add('tutorial-body');
        tutorial_block.setAttribute('id', depObj.id);
        tutorial_block.setAttribute('level', depObj.difficulty);//TODO replace with diff Level

        //assign content
        tutorial_body.innerHTML = depObj.content;
        title_span.innerHTML = depObj.title + ' (' + depObj.difficulty + ')';
        id_span.innerHTML = "ID : " + depObj.id;

        //put together
        tutorial_title.appendChild(id_span);
        tutorial_title.appendChild(title_span);

        tutorial_block.appendChild(tutorial_title);
        tutorial_block.appendChild(tutorial_body);
        tutorial_space.prepend(tutorial_block);

        let ref = {
            id : depObj.id,
            payload : tutorial_block,
            level : depObj.difficulty//TODO replace with diff Level
        }

        lookup.push(ref);
    }

    function loadDependencyAsync(deps){
        deps.forEach(dep => {
            Http = new XMLHttpRequest();
            Http.open("GET", "/api/topics/get_tutorial/"+dep.dependency_id);
            Http.send();

            let depQueue = [];

            Http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200){
                    let depObj = JSON.parse(Http.responseText);
                    appendDepContent(depObj);
                    
                    if (depObj.dependencies.length > 0){
                        loadDependencyAsync(depObj.dependencies);
                    }

                    adjustSlider();

                    console.log('#' + maxDiff);
                }                
            }
        });
    }

    function update_slider(level){
        toggle_dependency(level);
        adjusterContent.innerHTML = "Difficulty Adjuster ("+adjuster.value+")";
    }

    function toggle_dependency(level){

        for (let elt of lookup){
            if (level < elt.level){
                elt.payload.hidden = true;
            } else {
                elt.payload.hidden = false;
            }
        }
    }
</script>