# PHP Programming Note

This project is a structured, executable PHP learning note. Instead of using only textual explanations, each chapter is organized as a folder containing runnable PHP files. Each file demonstrates one PHP concept through code, comments, and browser output.

The project focuses on PHP syntax, backend handling, form processing, file handling, sessions, cookies, MySQL database interaction, CRUD operations, authentication, security basics, and JSON API development.

## Project Goal

The goal of this note is to help beginners learn PHP by reading and running real examples. Every `.php` file is designed to be opened through a local PHP server such as XAMPP, so the learner can directly observe how PHP code works in the browser.

This project is suitable for learning:

- Basic PHP syntax
- PHP inside HTML
- Variables, data types, constants, operators, strings, conditions, loops, arrays, and functions
- Form submission using GET and POST
- Superglobals such as `$_GET`, `$_POST`, `$_SERVER`, `$_SESSION`, `$_COOKIE`, and `$_FILES`
- File handling and file upload
- Error handling and debugging
- MySQL setup and database interaction using PDO
- SELECT, INSERT, UPDATE, DELETE, and complete CRUD systems
- Table relationships and SQL join queries
- Login, registration, sessions, and password hashing
- Backend security basics
- PHP JSON API basics

## Recommended Environment

To run this project smoothly, use:

- XAMPP
- Apache
- MySQL or MariaDB
- PHP 8 or above
- A web browser
- A code editor such as Visual Studio Code

## How to Run the PHP Files

1. Install and open XAMPP.
2. Start Apache.
3. Start MySQL when using database chapters.
4. Place the `PHP` folder inside the XAMPP `htdocs` folder.
5. Open your browser.
6. Visit the file through `localhost`.

Example:

```text
http://localhost/PHP/CH01%20-%20PHP%20Introduction%20and%20Setup/01%20-%20First%20PHP%20Script.php
```

Do not open the `.php` file directly by double-clicking it, because PHP code must be processed by a server before the browser can display the final result.

## Main Folder Structure

```text
PHP/
├── CH01 - PHP Introduction and Setup/
├── CH02 - Variables Data Types and Constants/
├── CH03 - Operators and Expressions/
├── CH04 - Strings and Output Formatting/
├── CH05 - Conditional Statements/
├── CH06 - Loops/
├── CH07 - Arrays/
├── CH08 - Functions/
├── CH09 - Forms and User Input/
├── CH10 - Superglobals/
├── CH11 - Include Require and File Organization/
├── CH12 - Sessions Cookies and Basic Login Concept/
├── CH13 - File Handling/
├── CH14 - File Upload/
├── CH15 - Error Handling and Debugging/
├── CH16 - MySQL Database Preparation/
├── CH17 - PDO MySQL Connection/
├── CH18 - MySQL Select and Display Data/
├── CH19 - MySQL Insert Data/
├── CH20 - MySQL Update Data/
├── CH21 - MySQL Delete Data/
├── CH22 - Complete CRUD System/
├── CH23 - Relationships and Join Queries/
├── CH24 - Login Register and Authentication with MySQL/
├── CH25 - Security Basics for Backend PHP/
└── CH26 - PHP and JSON API/
```

## File Naming Pattern

Each chapter folder uses this naming pattern:

```text
CH01 - Topic Name
```

Each executable file uses this naming pattern:

```text
01 - File Name.php
```

If a chapter requires a larger example, it may contain subfolders such as:

```text
01 - Student CRUD/
├── 01 - index.php
├── 02 - create.php
├── 03 - store.php
└── includes/
    └── db.php
```

## Chapter Summary

| Chapter | Topic | Main Purpose |
|---|---|---|
| CH01 | PHP Introduction and Setup | Introduces PHP syntax, PHP tags, PHP inside HTML, output, comments, and `phpinfo()`. |
| CH02 | Variables Data Types and Constants | Teaches variables, strings, integers, floats, booleans, null values, constants, scope preview, and type checking. |
| CH03 | Operators and Expressions | Demonstrates arithmetic, assignment, comparison, logical, string, increment, decrement, and ternary operators. |
| CH04 | Strings and Output Formatting | Teaches string concatenation, quotes, string functions, escape characters, heredoc, nowdoc, safe output, and short echo tag `<?= ?>`. |
| CH05 | Conditional Statements | Explains decision-making using `if`, `if else`, `else if`, nested `if`, `switch`, and `match`. |
| CH06 | Loops | Demonstrates repeated execution using `while`, `do while`, `for`, `foreach`, `break`, `continue`, and loop-generated HTML tables. |
| CH07 | Arrays | Teaches indexed arrays, associative arrays, multidimensional arrays, array looping, array functions, and displaying arrays in HTML tables. |
| CH08 | Functions | Explains reusable code using functions, parameters, return values, default parameters, type declarations, variable scope, and helper functions. |
| CH09 | Forms and User Input | Teaches form submission using GET and POST, input handling, radio buttons, checkboxes, select options, textarea, sticky values, and validation. |
| CH10 | Superglobals | Introduces PHP built-in superglobal arrays such as `$_REQUEST`, `$_GET`, `$_POST`, `$_SERVER`, `$_FILES`, `$_SESSION`, and `$_COOKIE`. |
| CH11 | Include Require and File Organization | Teaches how to split PHP projects into reusable files using `include`, `require`, header files, footer files, navigation files, and config files. |
| CH12 | Sessions Cookies and Basic Login Concept | Demonstrates sessions, storing session data, destroying sessions, creating cookies, reading cookies, deleting cookies, and a simple login concept. |
| CH13 | File Handling | Teaches how PHP reads, writes, appends, checks, reads CSV files, and writes CSV files. |
| CH14 | File Upload | Explains file upload handling, file type validation, file size validation, renaming uploaded files, and image preview. |
| CH15 | Error Handling and Debugging | Teaches error display settings, `try-catch`, throwing exceptions, custom error messages, and debugging with `var_dump()`. |
| CH16 | MySQL Database Preparation | Provides SQL files and setup guide for creating the learning database and sample `students` table. |
| CH17 | PDO MySQL Connection | Teaches how to connect PHP to MySQL using PDO, connection configuration, reusable database connection files, and connection error handling. |
| CH18 | MySQL Select and Display Data | Teaches `SELECT`, displaying database records, selecting one record, searching, sorting, limiting results, `fetch()`, and `fetchAll()`. |
| CH19 | MySQL Insert Data | Teaches inserting static data, inserting form data, using prepared statements, validation before insert, and success/error messages. |
| CH20 | MySQL Update Data | Demonstrates updating static data, loading existing data into an edit form, updating form data, prepared statements, and redirecting after update. |
| CH21 | MySQL Delete Data | Teaches deleting records by ID, delete confirmation, soft delete concept, and safe deletion using prepared statements. |
| CH22 | Complete CRUD System | Combines SELECT, INSERT, UPDATE, and DELETE into complete Student CRUD and Product CRUD systems. |
| CH23 | Relationships and Join Queries | Teaches primary key, foreign key, one-to-many relationships, `INNER JOIN`, `LEFT JOIN`, `COUNT()`, `GROUP BY`, and customer-order examples. |
| CH24 | Login Register and Authentication with MySQL | Teaches user registration, password hashing, password verification, login, protected pages, sessions, and logout. |
| CH25 | Security Basics for Backend PHP | Explains SQL injection prevention, XSS prevention, validation, sanitization, password hashing, session protection, and CSRF token basics. |
| CH26 | PHP and JSON API | Teaches JSON response, JSON input, API-style SELECT, API-style INSERT, error response format, HTTP status codes, and simple REST-style routing. |

## Learning Path

The recommended learning path is to study the chapters in order:

```text
CH01 to CH08: PHP syntax foundation
CH09 to CH15: Backend input, state, file, and error handling
CH16 to CH23: MySQL database interaction and CRUD
CH24 to CH25: Authentication and backend security
CH26: JSON API basics
```

Do not skip the early chapters if you are new to PHP. Later chapters use syntax and concepts from earlier chapters, especially variables, arrays, functions, forms, sessions, and includes.

## Database Chapters Requirement

The database-related chapters require MySQL to be running.

Before running CH17 to CH26, you should complete CH16 first because CH16 prepares the sample database and tables.

Recommended steps:

1. Open XAMPP.
2. Start Apache and MySQL.
3. Open phpMyAdmin.
4. Run the SQL files from CH16.
5. Then run the PHP files from CH17 onward.

Default XAMPP MySQL settings usually look like this:

```php
$host = "localhost";
$dbName = "php_note_db";
$username = "root";
$password = "";
```

If your MySQL username, password, or database name is different, update the `includes/db.php` file inside the related chapter.

## Important PHP Concepts Used in This Project

### PHP Opening and Closing Tags

PHP code is written inside:

```php
<?php
    echo "Hello World";
?>
```

When PHP code is only used for backend processing, the closing `?>` tag can sometimes be omitted in pure PHP files. However, in this project, many files mix PHP with HTML, so the PHP tags are shown clearly for learning purposes.

### Short Echo Tag

The short echo tag is used to quickly output a value inside HTML:

```php
<?= $name ?>
```

It is the shorter version of:

```php
<?php echo $name; ?>
```

However, when outputting user input, use `htmlspecialchars()` for safety:

```php
<?= htmlspecialchars($name) ?>
```

### Safe Database Interaction

This project uses PDO prepared statements for database interaction.

A prepared statement is safer than directly inserting user input into SQL.

Example:

```php
$sql = "SELECT * FROM students WHERE student_id = :id";
$statement = $pdo->prepare($sql);
$statement->execute([
    "id" => $studentId
]);
```

This helps prevent SQL injection.

### Safe HTML Output

When displaying user input in HTML, use:

```php
htmlspecialchars($value)
```

This helps prevent Cross-Site Scripting, also known as XSS.

## Notes About README Files

Each chapter contains its own `README.md` file. The chapter README explains:

- The purpose of the chapter
- The files included in the chapter
- The main concepts taught
- How to run the examples
- Important reminders for that chapter

The root `README.md` explains the whole project.

## Notes About CSS Files

Each chapter contains its own `style.css` file. The CSS is local to that chapter, not global to the whole project.

This makes each chapter self-contained and easier to copy, move, or study independently.

## Notes About Security

This project is for learning, so some examples are simplified to make the concept easier to understand.

For real production systems, you should also consider:

- Stronger validation rules
- Better error logging
- HTTPS
- Secure cookie settings
- CSRF protection for all important forms
- Authorization checks
- Rate limiting for login attempts
- Proper project structure outside the public web root
- Environment variables for database passwords
- Composer and modern PHP autoloading

## What This Project Does Not Cover

This project focuses on beginner-to-intermediate PHP backend concepts. It does not deeply cover:

- Object-Oriented PHP
- Composer
- MVC frameworks
- Laravel
- REST API authentication with tokens
- Deployment to real hosting
- Advanced database design
- Advanced security engineering

These topics can be learned after completing this project.

## Final Reminder

PHP code must be executed by a server. Always open the files through `localhost` instead of opening them directly from your file explorer.

This project is designed to be learned by running, modifying, breaking, and fixing the examples.
