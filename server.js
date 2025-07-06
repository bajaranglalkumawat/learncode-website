const express = require('express');
const mysql = require('mysql');
const bodyParser = require('body-parser');
const session = require('express-session');

const app = express();
const port = 3000;

// Connect to MySQL
const db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'loginDB'
});

db.connect((err) => {
    if (err) {
        throw err;
    }
    console.log('MySQL Connected...');
});

// Middleware
app.use(bodyParser.urlencoded({ extended: true }));
app.use(express.static('public'));
app.use(session({
    secret: 'secret',
    resave: true,
    saveUninitialized: true
}));

// Middleware to check if user is logged in
function isAuthenticated(req, res, next) {
    if (req.session.loggedin) {
        next();
    } else {
        res.redirect('/login');
    }
}

// Routes
app.get('/', isAuthenticated, (req, res) => {
    res.sendFile(__dirname + '/index.html');
});

app.get('/login', (req, res) => {
    res.sendFile(__dirname + '/login.html');
});

app.post('/login', (req, res) => {
    const username = req.body.username;
    const password = req.body.password;

    if (username && password) {
        const sql = 'SELECT * FROM users WHERE username = ? AND password = ?';
        db.query(sql, [username, password], (err, results) => {
            if (results.length > 0) {
                req.session.loggedin = true;
                req.session.username = username;
                res.redirect('/');
            } else {
                res.send('Incorrect Username and/or Password!');
            }
        });
    } else {
        res.send('Please enter Username and Password!');
    }
});

app.get('/logout', (req, res) => {
    req.session.destroy((err) => {
        if (err) {
            return console.log(err);
        }
        res.redirect('/login');
    });
});

app.listen(port, () => {
    console.log(`Server is running on http://localhost:${port}`);
});
 

