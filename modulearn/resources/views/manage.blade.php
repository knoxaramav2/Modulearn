<!doctype html>

<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Modulearn - Manage</title>
    </head>
    <body>
        @include('partial/header')

        <div class="content manage-content">
            <div id='manage-sidebar'>
                <?php $option_list = array('Manage Users', 'Manage Topics') ?>

                <div class='manage-sidebar-title'><h2>Manage Panel</h2></div>
                <div class='spacer'></div>
                @foreach($option_list as $ot)
                    <button class='manage-sidebar-item'>{{$ot}}</button>
                @endforeach
            </div>
            <div id='manage-main'>
                <div id='manage-main-'>

                </div>
                <div>

                </div>
            </div>
        </div>
    </body>

</html>