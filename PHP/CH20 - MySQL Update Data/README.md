# CH20 - MySQL Update Data

This chapter teaches how to update existing records in a MySQL table using PHP and PDO.

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
| 01 - Update Static Data.php | Update one existing record using fixed values |
| 02 - Edit Form with Existing Data.php | Load an existing record and display it inside an edit form |
| 03 - Update Data from Form.php | Update a record using values submitted from a form |
| 04 - Update with Prepared Statement.php | Use named placeholders and `bindValue()` for safe updates |
| 05 - Redirect After Update.php | Redirect after a successful update using the POST-Redirect-GET pattern |
| includes/db.php | Reusable PDO database connection file |

## Important learning points

1. `UPDATE` modifies existing rows in a table.
2. `WHERE` is very important because it controls which row will be updated.
3. Forgetting `WHERE` may update all rows in the table.
4. Prepared statements should be used when SQL contains user input.
5. Edit pages usually load old data first, then display it inside a form.
6. `rowCount()` can show how many rows were affected.
7. `header("Location: ...")` can redirect the browser after an update.
8. `exit` should be used after `header()` to stop the current script.
9. `htmlspecialchars()` should be used when displaying database data in HTML.

## How to run

1. Start Apache and MySQL in XAMPP.
2. Import or run the SQL files from CH16.
3. Put the `PHP` folder inside `htdocs`.
4. Open the chapter files using `localhost`.

Example path:

```text
http://localhost/PHP/CH20%20-%20MySQL%20Update%20Data/01%20-%20Update%20Static%20Data.php
```
