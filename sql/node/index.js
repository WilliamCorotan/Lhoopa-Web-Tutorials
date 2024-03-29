const express = require('express');
const mysql = require('mysql');

const app = express();

const db = mysql.createConnection({
    host:'localhost',
    user:'root',
    password: '',
    database: 'tutorial'
});

app.get('/users', (req, res)=>{
    const sql = 'SELECT  comments.body, posts.title, users.first_name, users.last_name FROM comments INNER JOIN posts on posts.id = comments.post_id INNER JOIN users on users.id = comments.user_id ORDER BY posts.title';

    db.query(sql, (err, result) =>{
        if(err) throw new err;
        res.send(result);
    })
})

app.listen(8000, ()=> {
    console.log('connected in port 8000')
});
