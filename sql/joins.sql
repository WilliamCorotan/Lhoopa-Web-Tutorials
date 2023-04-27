SELECT * FROM users;
SELECT * FROM posts;

CREATE TABLE comments(
    id INT AUTO_INCREMENT,
    post_id INT,
    user_id INT,
    body TEXT,
    publish_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(id),
    Foreign Key (post_id) REFERENCES posts(id),
    Foreign Key (user_id) REFERENCES users(id)
);


--JOINS
-- INNER JOINS
SELECT  users.first_name,
        users.last_name,
        posts.title,
        posts.publish_date
FROM users
INNER JOIN posts
ON users.id = posts.user_id
ORDER BY posts.title;

-- LEFT JOIN
SELECT  comments.body,
        posts.title 
        FROM comments
        LEFT JOIN posts on posts.id = comments.post_id
        ORDER BY posts.title;

-- RIGHT JOIN
SELECT  comments.body,
        posts.title 
        FROM comments
        RIGHT JOIN posts on posts.id = comments.post_id
        ORDER BY posts.title;

-- NESTED JOIN
SELECT  comments.body,
        posts.title,
        users.first_name, 
        users.last_name 
        FROM comments
        INNER JOIN posts on posts.id = comments.post_id
        INNER JOIN users on users.id = comments.user_id
        ORDER BY posts.title;

