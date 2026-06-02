# CH17 - PDO MySQL Connection

This chapter teaches how PHP connects to MySQL using PDO.

PDO means PHP Data Objects. It is a database access system provided by PHP. In this note, PDO is used because it supports prepared statements, exception handling, and a cleaner database connection style.

Before running this chapter, make sure you have completed CH16 and created the database named `php_note_db`.

## Files in This Chapter

| No. | File | Main Concept |
| --- | --- | --- |
| 01 | 01 - PDO Connection Test.php | Connect to MySQL directly inside one PHP file |
| 02 | 02 - Connection Config File.php | Understand the database configuration values used to build a DSN |
| 03 | 03 - Reusable Database Connection.php | Use `require_once` and a reusable function from `includes/db.php` |
| 04 | 04 - Handle Connection Error.php | Use `try-catch` to handle database connection errors |
| 05 | includes/db.php | Store reusable PDO connection logic |

## Database Used in This Chapter

| Item | Value |
| --- | --- |
| Database name | `php_note_db` |
| Table name | `students` |
| Host | `localhost` |
| Username | `root` |
| Password | empty string for default XAMPP setup |

## Important Concepts

| Concept | Meaning |
| --- | --- |
| PDO | PHP Data Objects, a PHP database access system |
| DSN | Data Source Name, the connection string for PDO |
| `mysql:host=...` | Tells PDO to use the MySQL driver and connect to a host |
| `dbname=...` | Tells PDO which database to connect to |
| `charset=utf8mb4` | Allows the database connection to support many characters safely |
| `new PDO()` | Creates a new database connection object |
| `try-catch` | Handles connection errors without crashing the page directly |
| `PDOException` | The exception type thrown by PDO errors |
| `require_once` | Loads another PHP file one time only |
| `PDO::ATTR_ERRMODE` | Controls how PDO reports errors |
| `PDO::ERRMODE_EXCEPTION` | Makes PDO throw exceptions when errors happen |

## Suggested Learning Order

Run the files in this order:

```text
01 - PDO Connection Test.php
02 - Connection Config File.php
03 - Reusable Database Connection.php
04 - Handle Connection Error.php
```

## Important Reminder

The examples in this chapter use the default XAMPP MySQL account:

```text
Username: root
Password: empty
```

If your MySQL username or password is different, update the configuration values in the PHP files.

## Why Use PDO?

PDO is recommended for backend PHP database interaction because later chapters will use prepared statements for safer SQL commands.

Prepared statements are very important when user input is involved because they help prevent SQL injection.
