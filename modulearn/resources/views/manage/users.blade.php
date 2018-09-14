<!doctype html>

<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Modulearn - Manage Users</title>
    </head>
    <body onload="loadUserData();">
        @include('partial/header')

            <table class='data-table'>
                <thead>
                    <th>User Name</th>
                    <th>Id</th>
                    <th>Email</th>
                    <th>Admin</th>
                </thead>
                <tbody>
                    <td></td>
                </tbody>
            </table>

        <div class="content">
            <div>
                <button onclick="loadPrevUserPage();">Previous</button>
                <span id='page_num'></span>
                <button onclick="loadNextUserPage();">Next</button>
            </div>
        </div>
    </body>

    <script>

        const defaultLimit = 25;
        const defaultOffset = 0;
        var currentPage = 1;

        function createCell(text){
            var cell = document.createElement('td');
            var msg = document.createTextNode(text);
            cell.appendChild(msg);
            return cell;
        }

        function loadUsersTable(entries){
            //console.log(entries);
            var newBody = document.createElement('tbody');

            let isEven = true;
            
            entries.data.forEach(user => {
                //console.log(user);
                var row = document.createElement('tr');

                if (isEven){
                    row.classList.add('dark-td');
                }

                isEven = !isEven;

                row.appendChild(createCell(user.name));
                row.appendChild(createCell(user.id));
                row.appendChild(createCell(user.email));
                row.appendChild(createCell(user.isAdmin));
                newBody.appendChild(row);
            });

            var oldBody = document.getElementsByTagName('tbody')[0];
            oldBody.parentNode.replaceChild(newBody, oldBody);

            let pageNum = document.getElementById('page_num');
            pageNum.textContent="page " + entries.current_page;
            //currentPage = parseInt(entries.current_page);
        }

        function loadUserData(count, offset, pageChange){

            if (count === undefined){count = defaultLimit;}
            if (offset === undefined){offset = defaultLimit;}
            if (pageChange === undefined) {pageChange = 0;}

            console.log(">> " + pageChange + " " + currentPage);

            const Http = new XMLHttpRequest();
            url = "/api/user/getList";
            params = "limit="+count+"&offset="+offset+"&page_no="+(currentPage+pageChange);
            console.log(params);
            url += "?"+params;
            Http.onreadystatechange=function(){
                if (this.readyState == 4 && this.status == 200){
                    //console.log(Http.responseText);
                    let results = JSON.parse(Http.responseText);

                    if (results.data.length === 0){
                        return;
                    }

                    loadUsersTable(results);
                    console.log("Returned " + results.data.length + " results");

                    currentPage = parseInt(currentPage) + parseInt(pageChange);
                }
            }
            Http.open("GET", url, true);
            Http.send();
        }

        function loadNextUserPage(){
            loadUserData(undefined, defaultLimit * currentPage, 1);
        }

        function loadPrevUserPage(){
            console.log("CURR " + currentPage);
            if (currentPage <= 1){return;}
            loadUserData(undefined, defaultLimit * currentPage, -1);
        }
    </script>

</html>