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

            <div class="left_container">
                <div class="upper_container">
                    <div id="profile_header">
                        <img src="{{asset('images/a.jpg')}}" alt="Placeholder" height="256" width="256">
                        <a href="">Edit</a>
                    </div>
                </div>
                <div class="lower_container">
                    <div id="favorites_panel">
                        <h3>Favorites</h3>
                        @for($x=0; $x<=10; ++$x)
                            <div class="fav_item"></div>
                        @endfor
                    </div>
                </div>
            </div>
            <div class="right_container">
                <div class="upper_container">
                    <h2>Submitted</h2>
                    @for($x=0; $x<=3; ++$x)
                        <div class="submitted_item"></div>
                    @endfor
                </div>
                <div class="lower_container">
                    <h2>Blog Posts</h2>
                    @for($x=0; $x<=3; ++$x)
                        <div class="blog_item"></div>
                    @endfor
                </div>
            </div>
        </div>
    </body>
</html>