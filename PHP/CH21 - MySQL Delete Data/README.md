# CH21 - MySQL Delete Data

This chapter teaches how to delete records from a MySQL table using PHP and PDO.

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

For the soft delete example, the file will add this column automatically if it does not exist:

```sql
is_deleted TINYINT(1) NOT NULL DEFAULT 0
```

## Files in this chapter

| File | Main concept |
|---|---|
| 01 - Delete Static Record.php | Delete one fixed record using a fixed ID after button confirmation |
| 02 - Delete by ID.php | Delete a record based on an ID submitted from a form |
| 03 - Delete Confirmation Page.php | Show the selected record first before confirming delete |
| 04 - Soft Delete Concept.php | Mark a record as deleted instead of removing it permanently |
| 05 - Delete with Prepared Statement.php | Use `prepare()`, `bindValue()`, and `rowCount()` for safe delete |
| includes/db.php | Reusable PDO database connection file |

## Important learning points

1. `DELETE` removes rows from a table permanently.
2. `WHERE` is extremely important in a delete query.
3. Forgetting `WHERE` may delete all records in the table.
4. User input should not be joined directly into SQL.
5. Prepared statements protect delete operations from SQL injection.
6. `rowCount()` can show whether a delete operation affected a row.
7. A confirmation page is useful before destructive actions.
8. Soft delete is safer when you may need to recover records later.
9. `htmlspecialchars()` should still be used when displaying database data.

## How to run

1. Start Apache and MySQL in XAMPP.
2. Import or run the SQL files from CH16.
3. Put the `PHP` folder inside `htdocs`.
4. Open the chapter files using `localhost`.

Example path:

```text
http://localhost/PHP/CH21%20-%20MySQL%20Delete%20Data/01%20-%20Delete%20Static%20Record.php
```

## Safety reminder

Delete examples change real data in the `students` table.

If you want to test repeatedly, insert the sample students from CH16 again after deleting records.
