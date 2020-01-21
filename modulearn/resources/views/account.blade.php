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
            <div class="container-side-by-side">
                <div class="container-left">
                    <div id="profile-header">
                        <img src="{{asset('images/a.jpg')}}" alt="Placeholder" height="256" width="256">
                        <a href="">Edit</a>
                    </div>
                    <div>
                        @foreach ($submitted as $item)
                        <div>
                            <button>
                                <a href='/topics/{{$item->id}}/edit'>{{$item->title}}</a>
                            </button>
                            <!--<button>Edit</button>-->
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class='container-right'>
                    <h2>Submissions</h2>
                    
                </div>
            </div>
            <div>

            </div>
        </div>
    </body>
</html>