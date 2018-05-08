<!doctype html>

<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Modulearn - Login</title>
    </head>
    <body>
        @include('partial/header')

        @if(isset($username))

        <div class="content">
            <button>Logout</button>
        </div>

        @else

        <div class="content">

            @if(Session::has('err_sec') && strcmp(Session::get('err_sec'), 'err_login') == 0)
                @array_shift($errors);
                @foreach($errors->all() as $error)
                    <div class='error'>
                        {{$error}}
                    </div>
                @endforeach
            @endif

            <div class="login">
                <h3>Login</h3>
                <form method="post" action="/login">
                    {{ csrf_field() }}
                    <label>Username</label>
                    <input type="text" placeholder="Enter Username" id="login_username" name="name">
                    <br/>
                    <label>Password</label>
                    <input type="password" placeholder="Enter password" id="login_password" name="password">
                    <br/><br/>
                    <input type="submit" class="form_submit" value="Login" name="login" id="login">
                </form>
            </div>

            <div class="spacer"></div>

            @if(Session::has('err_sec') && strcmp(Session::get('err_sec'), 'err_signup') == 0)
                @array_shift($errors);
                @foreach($errors->all() as $error)
                    <div class='error'>
                        {{$error}}
                    </div>
                @endforeach
            @endif

            <div class="login">
                <h3>Sign-Up</h3>
                <form method="post" action="users">
                    {{ csrf_field() }}
                    <label>Username</label>
                    <input type="text" placeholder="Enter Username" id="signup_username" name="name">
                    <br/>
                    <label>Password</label>
                    <input type="password" placeholder="Enter password" id="signup_password" name="password">
                    <br/>
                    <div id="password_toggle_container">
                        <label>Toggle Password</label>
                        <label class="switch">
                            <input type="checkbox" id="show_pass">
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <br/>
                    <label>Email</label>
                    <input type="text" placeholder="Enter e-mail" id="email" name="email">
                    <br/><br/>
                    <input type="submit" class="form_submit" value="Create Account" name="signup" id="signup">
                </form>
            </div>
        </div>

        @endif
    </body>

</html>