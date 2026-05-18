MariaDB [(none)]> drop database php;
Query OK, 0 rows affected, 2 warnings (0.005 sec)

MariaDB [(none)]> create database php;
Query OK, 1 row affected (0.002 sec)

MariaDB [(none)]> use php;
Database changed
MariaDB [php]> create table users(id int AUTO_INCREMENT PRIMARY KEY,fullname varchar(50),username varchar(50),email varchar(50),phone varchar(50),password varchar(255));
Query OK, 0 rows affected (0.021 sec)

MariaDB [php]> desc users;
+----------+--------------+------+-----+---------+----------------+
| Field    | Type         | Null | Key | Default | Extra          |
+----------+--------------+------+-----+---------+----------------+
| id       | int(11)      | NO   | PRI | NULL    | auto_increment |
| fullname | varchar(50)  | YES  |     | NULL    |                |
| username | varchar(50)  | YES  |     | NULL    |                |
| email    | varchar(50)  | YES  |     | NULL    |                |
| phone    | varchar(50)  | YES  |     | NULL    |                |
| password | varchar(255) | YES  |     | NULL    |                |
+----------+--------------+------+-----+---------+----------------+
6 rows in set (0.015 sec)

MariaDB [php]> show table users;
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'users' at line 1
MariaDB [php]> select * from users;
+----+------------------+----------+--------------------------+---------+--------------------------------------------------------------+
| id | fullname         | username | email                    | phone   | password                                                     |
+----+------------------+----------+--------------------------+---------+--------------------------------------------------------------+
|  1 |                  |          |                          |         | $2y$10$9YVL/Fix1CE2wdqhvFGQt.wYLFK/YcHbYXZq7k6DH7RiSo70B/w8. |
|  2 | 07_Siddhi Gaikar | siddhi9  | siddhigaikar04@gmail.com | 7782983 | $2y$10$DV7joBToJqpWMcO6QPYeXupfl/qJ8aXRW3VqCdtdEyB2p3yE5mtcC |
|  3 | 07_Siddhi Gaikar | siddhi9  | siddhigaikar04@gmail.com | 7782983 | $2y$10$YpsuwOsuZ6YNpylC9wGJwutxkyaHt555fqJRDwkq604VLv6X.YIK2 |
+----+------------------+----------+--------------------------+---------+--------------------------------------------------------------+
3 rows in set (0.002 sec)

MariaDB [php]> create table books(id INT AUTO_INCREMENT PRIMARY KEY,title varchar(50),author varchar(50),image varchar(255));
Query OK, 0 rows affected (0.015 sec)

MariaDB [php]> ALTER TABLE books 
    -> ADD genre VARCHAR(50),
    -> ADD copies INT;
Query OK, 0 rows affected (0.016 sec)
Records: 0  Duplicates: 0  Warnings: 0

MariaDB [php]> 
MariaDB [php]> ALTER TABLE books ADD total_copies INT;
Query OK, 0 rows affected (0.015 sec)
Records: 0  Duplicates: 0  Warnings: 0

MariaDB [php]> desc users;
+----------+--------------+------+-----+---------+----------------+
| Field    | Type         | Null | Key | Default | Extra          |
+----------+--------------+------+-----+---------+----------------+
| id       | int(11)      | NO   | PRI | NULL    | auto_increment |
| fullname | varchar(50)  | YES  |     | NULL    |                |
| username | varchar(50)  | YES  |     | NULL    |                |
| email    | varchar(50)  | YES  |     | NULL    |                |
| phone    | varchar(50)  | YES  |     | NULL    |                |
| password | varchar(255) | YES  |     | NULL    |                |
+----------+--------------+------+-----+---------+----------------+
6 rows in set (0.004 sec)

MariaDB [php]> 
