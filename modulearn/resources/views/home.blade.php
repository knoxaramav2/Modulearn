<!doctype html>

<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Modulearn</title>
    </head>
    <body>
    
        @include('partial/header')

        <header class='home-header'>
            <nav>
                <div><a href='/'><h1>Start Here</h1></a></div>
                <div><a href='/'><h1>Explore Content</h1></a></div>
                <div><a href='/about'><h1>About Modulearn</h1></a></div>
            </nav>
        </header>
        <div class='content'>
            <div class='content-item'>
                <div>
                    <h2>Trending Tutorials</h2>
                </div>
                <div>

                </div>
            </div>
            <div class='content-item'>
                <div>
                    <h2>Trending Blog Posts</h2>
                </div>
                
            </div>
        </div>

    </body>
</html>

<script>
    
    function redirect(url){
        window.location = url;
    }
</script>