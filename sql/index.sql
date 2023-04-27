-- Active: 1682492578635@@127.0.0.1@3306@tutorial

-- to insert into the table
INSERT INTO users (first_name, last_name, email, password, location, dept,  is_admin, register_date) values ('Fred', 'Smith', 'fred@gmail.com', '123456', 'New York', 'design', 0, now()), ('Sara', 'Watson', 'sara@gmail.com', '123456', 'New York', 'design', 0, now()),('Will', 'Jackson', 'will@yahoo.com', '123456', 'Rhode Island', 'development', 1, now()),('Paula', 'Johnson', 'paula@yahoo.com', '123456', 'Massachusetts', 'sales', 0, now()),('Tom', 'Spears', 'tom@yahoo.com', '123456', 'Massachusetts', 'sales', 0, now());


--to select all from the table
SELECT * FROM users;

--to delete specific user
DELETE FROM users WHERE id = 6;

--to update specific user
UPDATE users SET email = 'freddie@gmail.com' WHERE id = 2;

--add column to the table
ALTER TABLE users ADD age VARCHAR(3);

--this is to alter the table column
ALTER TABLE users MODIFY COLUMN age INT(3);

-- this is for arder by
SELECT * FROM users ORDER BY id desc;

-- concat SELECT
SELECT CONCAT(first_name, " ", last_name) as "Name", dept FROM users;

-- select unique value in TABLE
SELECT DISTINCT location FROM users;


-- WHERE and betweeon 
SELECT * FROM users WHERE age BETWEEN 20 and 30;

-- select fields that contains
    -- a% - starts with a
    -- %a starts with a
    -- %es%  this are in the/ between
SELECT * FROM users WHERE dept LIKE 'des%';

--select fields that are in the conditions
SELECT * FROM users WHERE dept IN('design', 'development');


--adding an INDEX
CREATE INDEX LIndex on users(location);

--removing INDEX
DROP INDEX LIndex on users;