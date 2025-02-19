const express = require('express');
const mysql = require('mysql');
const app = express();
const port = 3000;

// MySQL connection configuration
const connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'test_db'
});

connection.connect(err => {
    if (err) {
        console.error('Error connecting to the database:', err);
        return;
    }
    console.log('Connected to the database');
});

app.use(express.static('public'));

app.get('/fetch', (req, res) => {
    const sql = 'SELECT id, data_column FROM test_table';
    connection.query(sql, (err, results) => {
        if (err) {
            res.status(500).send('Error fetching data');
            return;
        }
        res.json(results);
    });
});

app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}`);
});
// JavaScript Document