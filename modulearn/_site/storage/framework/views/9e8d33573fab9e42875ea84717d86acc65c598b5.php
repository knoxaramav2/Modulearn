<!doctype html>

<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Modulearn - Login</title>
    </head>
    <body>
        <?php echo $__env->make('partial/header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        
        <?php if(isset($username)): ?>

        <div class="content">
            <button>Logout</button>
        </div>

        <?php else: ?>

        <div class="content">
            <?php if(Session::has('err-sec') && strcmp(Session::get('err-sec'), 'err-login') == 0): ?>
                @array-shift($errors);
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class='error'>
                        <?php echo e($error); ?>


                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            <div class="collapsible">
                
                <div class="login">
                    <div class="collapse-control">
                        <button>(>)</button>
                    </div>
                    <h3>Login</h3>
                    <form method="post" action="/login?">
                        <?php echo e(csrf_field()); ?>

                        <label>Username</label>
                        <input type="text" placeholder="Enter Username" id="login-username" name="name">
                        <br/>
                        <label>Password</label>
                        <input type="password" placeholder="Enter password" id="login-password" name="password">
                        <br/><br/>
                        <input type="submit" class="form-submit" value="Login" name="login" id="login">
                    </form>
                </div>
            </div>

            <div class="spacer"></div>

            <?php if(Session::has('err-sec') && strcmp(Session::get('err-sec'), 'err-signup') == 0): ?>
                @array-shift($errors);
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class='error'>
                        <?php echo e($error); ?>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            <div class="collapsible">
                <div class="login">
                    <h3>Sign-Up</h3>
                    <form method="post" action="users">
                        <?php echo e(csrf_field()); ?>

                        <label>Username</label>
                        <input type="text" placeholder="Enter Username" id="signup-username" name="name">
                        <br/>
                        <label>Password</label>
                        <input type="password" placeholder="Enter password" id="signup-password" name="password">
                        <br/>
                        <div id="password-toggle-container">
                            <label>Toggle Password</label>
                            <label class="switch">
                                <input type="checkbox" id="show-pass" onclick="toggle_password_visibility()">
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <br/>
                        <label>Email</label>
                        <input type="text" placeholder="Enter e-mail" id="email" name="email">
                        <br/><br/>
                        <input type="submit" class="form-submit" value="Create Account" name="signup" id="signup">
                    </form>
                </div>
            </div>
        </div>

        <?php endif; ?>
    </body>

    <script>
    
        function toggle_password_visibility(){
            var psw = document.getElementById("signup-password");

            psw.type = psw.type === 'password' ? 'text' : 'password';
        }
    
    </script>

</html>