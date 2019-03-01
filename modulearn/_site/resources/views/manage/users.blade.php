<!doctype html>

<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script 'text/javascript' src='{{URL::asset('js/element.js')}}'></script>

        <title>Modulearn - Manage Users</title>
    </head>
    <body onload="loadUserData();">
        @include('partial/header')

        <div id='element-table'>

        </div>

        <div class="content">
            <div>
                <button onclick="loadPrevUserPage();">Previous</button>
                <span id='page_num'></span>
                <button onclick="loadNextUserPage();">Next</button>
            </div>
        </div>
    </body>

    <script>

        const defaultLimit = 10;
        const defaultOffset = 0;
        var currentPage = 1;

        function loadUsersTable(entries){

            try{
                table = buildTable(['Id', 'User Name', 'Email', 'Admin'], entries);
                table.classList.add('data-table');
            } catch (e){
                console.log(e);
            }
        
            let pageNum = document.getElementById('page_num');
            pageNum.textContent="page " + currentPage;
        }

        function loadUserData(count, offset, pageChange){

            if (count === undefined){count = defaultLimit;}
            if (offset === undefined){offset = defaultLimit;}
            if (pageChange === undefined) {pageChange = 0;}

            offset = (currentPage + pageChange - 1) * defaultLimit;

            const Http = new XMLHttpRequest();
            url = "/api/user/getList";
            params = "limit="+count+"&offset="+offset+"&page_no="+(currentPage+pageChange);
            console.log(params);
            url += "?"+params;
            Http.onreadystatechange=function(){
                if (this.readyState == 4 && this.status == 200){
                    let results = JSON.parse(Http.responseText);

                    if (results === undefined || results.length === 0){
                        return;
                    }

                    currentPage = parseInt(currentPage) + parseInt(pageChange);

                    loadUsersTable(results);
                }
            }
            Http.open("GET", url, true);
            Http.send();
        }

        function loadNextUserPage(){
            loadUserData(undefined, defaultLimit * currentPage, 1);
        }

        function loadPrevUserPage(){
            if (currentPage <= 1){return;}
            loadUserData(undefined, defaultLimit * currentPage, -1);
        }
    </script>

</html>