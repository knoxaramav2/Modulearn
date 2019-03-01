<!doctype html>

<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Modulearn - Terminal</title>
    </head>
    <body>
        <?php echo $__env->make('partial/header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <input type='hidden' value='<?php echo e(csrf_token()); ?>' id='token-data'/>
        <div class="terminal ">
            <textarea id='term-body' class='color-matrix'></textarea>
        </div>

        <form method='post' action='/api/manage/terminal'>
            <?php echo e(csrf_field()); ?>

            <input type='submit' value='Click'>
        </form>
    </body>

    <script>

    document.addEventListener('DOMContentLoaded', function(){
        buffer = "";
        par = document.getElementById('term-body');        
    }, false);

    document.onkeypress = function(e){
        //e = e || window.event;

        let key = e.keyCode || e.charCode;
        switch(key){
            
            //general
            case 13://enter
                submitCommand();                    
                buffer = "";
                par.value += '\n';
            break;

            default:
                buffer+=e.key;
        }

        console.log('okp   ' + buffer);
    };

    document.getElementById('term-body').addEventListener('keydown', function(e){

        if (e.code == 'Backspace'){
            if (buffer.length > 0){
                buffer = buffer.slice(0, -1);
                par.value = par.value.slice(0, -1);
            }
            e.preventDefault();
        }

        if (e.keyCode >= 37 && e.keyCode <= 40){
            console.log('arrow');
            e.preventDefault();
        }
        
        console.log('kd   ' + buffer);
    });

    function submitCommand(){

        tk = document.getElementById('token-data').value;

        let xhr = new XMLHttpRequest();
        xhr.withCredentials=true;
        xhr.open('POST', '/api/manage/terminal', true);
        xhr.setRequestHeader('content-type', 'application/json;charset=UTF-8');
        xhr.setRequestHeader('x-csrf-token', tk)
        xhr.send(JSON.stringify({msg: buffer}));
    }

    
    </script>

</html>