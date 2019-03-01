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
                <div class='manage-sidebar-title'><h2>Manage Panel</h2></div>
                <div class='spacer'></div>
                    <div>
                        <button class='manage-sidebar-item' onclick='location.href="manage/terminal"'>Terminal</button>
                    </div>
                    <div>
                        <button class='manage-sidebar-item' onclick='location.href="manage/users"'>Manage Users</button>
                    </div>
                    <div>
                        <button class='manage-sidebar-item' onclick='location.href="manage/topics"'>Manage Topics</button>
                    </div>
                </div>
            <div id='manage-main'>
                <div class='manage-main-block'>
                    <h2>Analytics</h2>
                </div>
                <div class='manage-main-block'>
                    <h2>Stuff</h2>
                </div>
            </div>
        </div>
    </body>

    <script>
        
    </script>
</html>