<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
    <link href="{{asset('css/tutorial.css')}}" rel="stylesheet">
</head>
<body  onload='ready();'>
    <div id='tutorial-editor'>
            <div id='tutorial-editor-main'>
                <form action='/topics/{{$content->id ?? ""}}' id='tutorial-form' method="POST">
                    {{ csrf_field() }}
                    @if (isset($alt_action))
                        {{ method_field($alt_action) }}
                    @endif

                    <input type='hidden' id='input-markdown' name='input-markdown'>
                    <input type='hidden' id='diff-setting' name='difficulty'>
                    <div>
                        <input type='text' placeholder="Enter a title" name='title'/>
                    </div>
                    <div>
                        <textarea id='md-editor'></textarea>
                    </div>
                    <input type='submit' onclick='prepareSubmitData();'>
                </form>
            </div>
            <div id='tutorial-editor-toolbar'>
                <div class='tutorial-editor-tool'>
                <div class='gadget-panel'>
                        <div class='gadget-container gadget-right'>
                            <span>Difficulty</span> <span id='diff-display'></span>
                            <input id='diff-slider' type='range' min='1' max='10' value={{$content->level ?? 3}} oninput="update_slider(this.value);";>
                        </div>
                    </div>
                    <div id='dependency-container'>
                        <div>
                            <h3>Add pre-requisites</h3>
                        </div>
                        <div id='add-dep-btn'>
                            <div>
                                <button onclick="addDependency();">
                                    Add a dependency
                                    <img src='/icons/add-content.ico'>
                                </button>
                            </div>
                            <div class='tooltip-parent'>
                                <input type='number' id='dependency-id'
                                    placeholder="Enter dependency id">
                                    <span class='tooltip'>Id can be found on the tutorial page</span>
                            </div>
                        </div>
                        <div id='dependency-list'>
                        </div>
                    </div>
                    <div id='tag-container'>
                        <div>
                            <h3>Add tags</h3>
                        </div>
                        <div id='tag-list'>
                            @foreach ($tags as $tag)
                            <span class='search-tag'>{{$tag->title}}</span>   
                            @endforeach
                        </div>
                        <div>
                            <input type='textbox' id='tag-box' >
                            <button>
                                <img src='/icons/add-content.ico'>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
<script>

    var simplemde;
    var difficulty = 1;
    var diffSlider;
    var diffDisplay;

    function tagVisualUpdate(tagField){

    }

    function getMdEditor(){
        return simplemde;
    }

    document.getElementById('tutorial-form').onkeypress = function(e){
        let kp = e.charCode || e.keyCode;
        if (kp == 13) {e.preventDefault();} 
    }

    function prepareSubmitData(){
        let md = document.getElementById("input-markdown");
        let tags = document.getElementById('tag-box');

        md.value = simplemde.value();


        let deps = document.getElementsByClassName('dependency-item');
        let form = document.getElementById('tutorial-form');
        let diff = document.getElementById('diff-setting').value=diffSlider.value;

        console.log(deps);

        for(let itr = 0; itr < deps.length; ++itr){
            let input = document.createElement('input');
            input.type='text';
            input.name = 'dep-' + itr;
            input.hidden = true;
            input.value=deps[itr].firstChild.innerText;
            form.appendChild(input);
        };
    }

    function ready(){
        simplemde = new SimpleMDE({
            element:document.getElementById("md-editor"),
            indentWithTabs: false,
            spellChecker: true,
            tabSize: 4,
            autofocus: true
            });
        diffSlider = document.getElementById('diff-slider');
        diffDisplay = document.getElementById('diff-display');
        diffDisplay.textContent='  ( '+diffSlider.value+' )';
    }

    function addDependency(id){

        if (id === undefined){
            let idDiv = document.getElementById('dependency-id');
            id = idDiv.value;
        }
        
        if (id.length === 0){
            return;
        }
        
        let depList = document.getElementById('dependency-list');
        let div = document.createElement('div');
        let text = document.createTextNode(id);
        let span = document.createElement('span');
        let button = document.createElement('button');
        let min = document.createTextNode('-');
        
        button.onclick=(function(){div.remove()});
        button.appendChild(min);
        span.appendChild(text);
        div.classList.add('dependency-item');
        div.appendChild(span);
        div.appendChild(button);
        depList.appendChild(div);

        if (id === undefined){
            idDiv.value='';
        }
    }

    function update_slider(level){
        value = level;
        diffDisplay.textContent='  ( '+level+' )';
    }

</script>