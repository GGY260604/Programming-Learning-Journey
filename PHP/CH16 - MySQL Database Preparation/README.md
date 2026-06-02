# CH16 - MySQL Database Preparation

This chapter prepares the MySQL database before PHP starts connecting to it using PDO.

In previous chapters, the examples mainly focused on PHP syntax, form handling, sessions, cookies, files, upload, and error handling. Starting from this chapter, the note moves toward backend database interaction.

Before writing PHP database code, you should first understand how to create a database, create a table, insert sample data, and test a basic `SELECT` query directly in MySQL or phpMyAdmin.

## Files in This Chapter

| No. | File | Main Concept |
| --- | --- | --- |
| 01 | 01 - Create Database.sql | Create a MySQL database for this PHP note |
| 02 | 02 - Create Students Table.sql | Create a sample `students` table |
| 03 | 03 - Insert Sample Students.sql | Insert sample records into the table |
| 04 | 04 - Select Sample Data.sql | Test whether the table contains data |
| 05 | 05 - Database Setup Guide.php | Explain how to run the SQL files using phpMyAdmin |

## Database Used in This Chapter

| Item | Value |
| --- | --- |
| Database name | `php_note_db` |
| Table name | `students` |
| Main purpose | Prepare data for later PDO SELECT, INSERT, UPDATE, and DELETE examples |

## Students Table Overview

| Column | Type | Purpose |
| --- | --- | --- |
| `student_id` | `INT` | Primary key and auto-increment ID |
| `student_name` | `VARCHAR(100)` | Student name |
| `email` | `VARCHAR(150)` | Student email address |
| `course` | `VARCHAR(100)` | Student course name |
| `year_level` | `INT` | Student year level |
| `created_at` | `TIMESTAMP` | Date and time when the record is created |

## Important Concepts

| Concept | Meaning |
| --- | --- |
| `CREATE DATABASE` | Creates a new database |
| `USE` | Selects which database the SQL commands should run on |
| `CREATE TABLE` | Creates a new table inside a database |
| `PRIMARY KEY` | A column that uniquely identifies each row |
| `AUTO_INCREMENT` | Automatically generates the next ID number |
| `VARCHAR` | Stores text with a maximum length |
| `INT` | Stores whole numbers |
| `TIMESTAMP` | Stores date and time |
| `INSERT INTO` | Adds new records into a table |
| `SELECT` | Retrieves records from a table |

## Suggested Running Order

Run the SQL files in this order:

```text
01 - Create Database.sql
02 - Create Students Table.sql
03 - Insert Sample Students.sql
04 - Select Sample Data.sql
```

## How to Run the SQL Files in phpMyAdmin

1. Start Apache and MySQL in XAMPP.
2. Open phpMyAdmin using `http://localhost/phpmyadmin`.
3. Open the SQL tab.
4. Copy and paste the SQL from the file.
5. Click Go.
6. Repeat the same process for the next SQL file.

## Important Reminder

This chapter does not yet use PHP to connect to MySQL.

The purpose of this chapter is to prepare the database first. PHP database connection will start from the next chapter using PDO.
