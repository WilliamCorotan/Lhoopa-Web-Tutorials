--COUNT - count for how many entries 
SELECT COUNT(id) FROM users;

--MAX - gets maximum value
SELECT MAX(age) FROM users;

--MIN- gets the minimum value
SELECT MIN(age) FROM users;

--SUM - gets the sum of the column
SELECT SUM(age) FROM users;

--UPPERCASE and LOWERCASE functions
SELECT UCASE(first_name), LCASE(last_name) FROM users;

--GROUP BY
SELECT location, COUNT(location) FROM users GROUP BY location

