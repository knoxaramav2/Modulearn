/*
    Dynamically construct html elements
*/

function makeCell(text, type){
    var cell = document.createElement(type);
    var msgNode = document.createTextNode(text);
    cell.appendChild(msgNode);
    return cell;
}

function makeRow(contents, rClass, isHeader){

    //console.log(contents);

    let cType = isHeader ? 'th' : 'td';
    let row = document.createElement('tr');

    Object.keys(contents).forEach(function(key){
        row.appendChild(makeCell(contents[key], cType));
    });

    if (rClass !== null){
        row.classList.add(rClass);
    }

    return row;
}

//create a table
function buildTable(headers, data){

    let tableDiv = document.getElementById('element-table');

    if (tableDiv.childElementCount > 0){
        let child = tableDiv.children[0];
        tableDiv.removeChild(child);
    }
    
    if (tableDiv === null){
        throw "Requires div with id='element-table'";
    }

    let table = document.createElement('table');
    let tHead = document.createElement('thead');
    let tBody = document.createElement('tbody');
    let darkLine = true;

    //console.log(headers);

    tHead.appendChild(makeRow(headers, null, true));

    for(let i = 0; i < data.length; ++i){
        //console.log(data[i]);
        let row = makeRow(data[i], darkLine?'element-td-dark': null, false);
        darkLine = !darkLine;
        tBody.appendChild(row);
    };

    table.appendChild(tHead);
    table.appendChild(tBody);
    tableDiv.appendChild(table);
    return table;
}