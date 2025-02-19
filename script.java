document.addEventListener('DOMContentLoaded', function() {
    displayRecords();
});

document.getElementById('dataForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const sno = document.getElementById('sno').value;
    const news = document.getElementById('news').value;

    const newData = {
        sno: parseInt(sno),
        news: news
    };

    let data = [];

    if (localStorage.getItem('jsonData')) {
        data = JSON.parse(localStorage.getItem('jsonData'));
    }

    data.push(newData);
    localStorage.setItem('jsonData', JSON.stringify(data));

    displayRecords();

    // Clear the form
    document.getElementById('sno').value = '';
    document.getElementById('news').value = '';
});

function displayRecords() {
    const recordsTable = document.getElementById('recordsTable');
    recordsTable.innerHTML = '';

    let data = [];

    if (localStorage.getItem('jsonData')) {
        data = JSON.parse(localStorage.getItem('jsonData'));
    } else {
        data = [
            {
                sno: 1,
                news: "<html><body><h1>News Title 1</h1><p>This is the news content for article 1.</p></body></html>"
            },
            {
                sno: 2,
                news: "<html><body><h1>News Title 2</h1><p>This is the news content for article 2.</p></body></html>"
            },
            {
                sno: 3,
                news: "<html><body><h1>News Title 3</h1><p>This is the news content for article 3.</p></body></html>"
            },
            {
                sno: 4,
                news: "<html><body><h1>News Title 4</h1><p>This is the news content for article 4.</p></body></html>"
            }
        ];
        localStorage.setItem('jsonData', JSON.stringify(data));
    }

    data.forEach((record, index) => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${record.sno}</td>
            <td>${record.news}</td>
            <td>
                <button onclick="deleteRecord(${index})">Delete</button>
            </td>
        `;
        recordsTable.appendChild(row);
    });
}

function deleteRecord(index) {
    let data = [];

    if (localStorage.getItem('jsonData')) {
        data = JSON.parse(localStorage.getItem('jsonData'));
    }

    data.splice(index, 1);
    localStorage.setItem('jsonData', JSON.stringify(data));

    displayRecords();
}
