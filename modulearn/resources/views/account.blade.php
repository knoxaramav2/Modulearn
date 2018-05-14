<!doctype html>

<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Account</title>
    </head>
    <body>
    
        @include('partial/header')

        <div class="content">
            <div class="left-container">
                <div class="upper-container">
                    <div id="profile-header">
                        <img src="{{asset('images/a.jpg')}}" alt="Placeholder" height="256" width="256">
                        <a href="">Edit</a>
                    </div>
                </div>
                <div class="lower-container">
                    <div id="favorites-panel">
                        <h3>Favorites</h3>
                        @for($x=0; $x<=10; ++$x)
                            <div class="fav-item"></div>
                        @endfor
                    </div>
                </div>
            </div>
            <div class="right-container">
                <div class="upper-container">
                    <h2>Submitted</h2>
                    @for($x=0; $x<=3; ++$x)
                        <div class="submitted-item"></div>
                    @endfor
                </div>
                <div class="lower-container">
                    <h2>Blog Posts</h2>
                    @for($x=0; $x<=3; ++$x)
                        <div class="blog-item"></div>
                    @endfor
                </div>
            </div>
        </div>
    </body>
</html>