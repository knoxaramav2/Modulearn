<!doctype html>

<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Modulearn</title>
    </head>
    <body>
    
        @include('partial/header')

        <div class="content">
            <div id="search-by-topic">
                <h2>Search by Topic</h2>
                <div id="link-box">
                    <?php $topics=array('Computer Science','Math','English', 'Electrical Engineering', 'Physics',
                    'Biology', 'History', 'Religion', '') ?>
                    @foreach($topics as $topic)
                        <span><a href="/">{{$topic}}</a></span>
                    @endforeach
                </div>
            </div>

            <div id="getting-started">
                <h2>Getting Started</h2>
                <div class='spacer'></div>
                <p>
                    Modulearn is a platform for creating more than 
                    just tutorials. It is a place for connecting ideas
                    together to make learning easy and intuitive.
                </p>
                <p> 
                    Users
                    are also encouraged to use the platform to write
                    projects they work on and their findings, to utilize
                    this site as one large knowledge base.
                </p>

                <div>
                    <div><button>Start Creating</button></div>
                    <div><button onclick="redirect('/api/content')">Explore</button></div>
                </div>
            </div>

            <div id="popular-slider">
                <h2>Popular Threads</h2>
            </div>
        </div>

    </body>
</html>

<script>
    
    function redirect(url){
        window.location = url;
    }
</script>