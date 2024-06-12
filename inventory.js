let currentPage = 1;
const rowsPerPage = 3;

document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('searchInput');
    searchInput.addEventListener('keyup', filterTable);
    updateTable();
    updatePagination();
});

function filterTable() {
    const filter = document.getElementById('searchInput').value.toUpperCase();
    const table = document.getElementById('dataTable');
    const tr = table.getElementsByTagName('tr');
    
    for (let i = 1; i < tr.length; i++) {
        tr[i].style.display = 'none';
        const td = tr[i].getElementsByTagName('td');
        for (let j = 0; j < td.length; j++) {
            if (td[j]) {
                if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = '';
                    break;
                }
            }
        }
    }
}

function sortTable(n) {
    const table = document.getElementById('dataTable');
    let rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    switching = true;
    dir = 'asc'; 
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName('TD')[n];
            y = rows[i + 1].getElementsByTagName('TD')[n];
            if (dir == 'asc') {
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    shouldSwitch = true;
                    break;
                }
            } else if (dir == 'desc') {
                if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                    shouldSwitch = true;
                    break;
                }
            }
        }
        if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            switchcount++;
        } else {
            if (switchcount == 0 && dir == 'asc') {
                dir = 'desc';
                switching = true;
            }
        }
    }
}

function updateTable() {
    const table = document.getElementById('dataTable');
    const tr = table.getElementsByTagName('tr');
    const start = (currentPage - 1) * rowsPerPage + 1;
    const end = start + rowsPerPage;
    for (let i = 1; i < tr.length; i++) {
        tr[i].style.display = i >= start && i < end ? '' : 'none';
    }
}

function updatePagination() {
    const table = document.getElementById('dataTable');
    const tr = table.getElementsByTagName('tr');
    const totalPages = Math.ceil((tr.length - 1) / rowsPerPage);
    document.getElementById('pageInfo').innerText = `Page ${currentPage} of ${totalPages}`;
}

function nextPage() {
    const table = document.getElementById('dataTable');
    const tr = table.getElementsByTagName('tr');
    const totalPages = Math.ceil((tr.length - 1) / rowsPerPage);
    if (currentPage < totalPages) {
        currentPage++;
        updateTable();
        updatePagination();
    }
}

function prevPage() {
    if (currentPage > 1) {
        currentPage--;
        updateTable();
        updatePagination();
    }
}

window.addCuisine = function(){
    
}