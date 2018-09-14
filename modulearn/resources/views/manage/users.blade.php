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
        </div>
    </body>

    <script>

        const defaultLimit = 25;
        const defaultOffset = 0;

        function createCell(text){
            var cell = document.createElement('td');
            var msg = document.createTextNode(text);
            cell.appendChild(msg);
            return cell;
        }

        function loadUsersTable(entries){
            console.log(entries);
            var newBody = document.createElement('tbody');

            let isEven = true;
            
            entries.data.forEach(user => {
                console.log(user);
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
        }

        function loadUserData(count, offset){

            if (count === undefined){
                count = defaultLimit;
            }

            if (offset === undefined){
                offset = defaultLimit;
            }

            const Http = new XMLHttpRequest();
            url = "/api/user/getList";
            params = "limit="+count+"&offset="+offset;
            console.log(params);
            url += "?"+params;
            Http.onreadystatechange=function(){
                if (this.readyState == 4 && this.status == 200){
                    console.log(Http.responseText);
                    let results = JSON.parse(Http.responseText);
                    loadUsersTable(results);
                    console.log("Returned " + results.data.length + " results");
                }
            }
            Http.open("GET", url, true);
            Http.send();
        }

        function loadNextUserPage(){

        }

        function loadPrevUserPage(){

        }
    </script>

</html>