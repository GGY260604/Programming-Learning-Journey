# CH19 - MySQL Insert Data

This chapter teaches how to insert new records into a MySQL table using PHP and PDO.

Before running this chapter, make sure you have already prepared the database from CH16.

The examples in this chapter use this database and table:

```sql
Database: php_note_db
Table: students
```

Expected `students` table columns:

```sql
student_id INT AUTO_INCREMENT PRIMARY KEY
student_name VARCHAR(100) NOT NULL
email VARCHAR(150) NOT NULL UNIQUE
course VARCHAR(100) NOT NULL
year_level INT NOT NULL
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
```

## Files in this chapter

| File | Main concept |
|---|---|
| 01 - Insert Static Data.php | Insert a hard-coded record into the database |
| 02 - Insert Data from Form.php | Insert form input into the database |
| 03 - Insert with Prepared Statement.php | Use prepared statements to insert data safely |
| 04 - Validate Before Insert.php | Validate user input before inserting data |
| 05 - Show Success and Error Message.php | Display user-friendly success and error messages |
| includes/db.php | Reusable PDO database connection file |

## Important learning points

1. `INSERT INTO` adds a new row into a table.
2. `prepare()` creates a prepared SQL statement.
3. `execute()` runs the prepared SQL statement.
4. Prepared statements are important when SQL contains user input.
5. Validation should happen before inserting data.
6. `lastInsertId()` can get the ID of the newly inserted row.
7. `htmlspecialchars()` should be used when displaying user input back to HTML.

## How to run

1. Start Apache and MySQL in XAMPP.
2. Import or run the SQL files from CH16.
3. Put the `PHP` folder inside `htdocs`.
4. Open the chapter files using `localhost`.

Example path:

```text
http://localhost/PHP/CH19%20-%20MySQL%20Insert%20Data/01%20-%20Insert%20Static%20Data.php
```
