# CH24 - Login Register and Authentication with MySQL

This chapter teaches the basic backend authentication flow using PHP, MySQL, PDO, sessions, and password hashing.

Authentication means the system checks whether a user is really allowed to log in. In PHP backend development, a simple authentication flow usually contains registration, login, session storage, protected pages, and logout.

## Folder Structure

```text
PHP/
└── CH24 - Login Register and Authentication with MySQL/
    ├── README.md
    ├── style.css
    ├── 01 - Create Users Table.sql
    ├── 02 - Register Form.php
    ├── 03 - Store User with Password Hash.php
    ├── 04 - Login Form.php
    ├── 05 - Verify Password.php
    ├── 06 - Protected Page.php
    ├── 07 - Logout.php
    └── includes/
        └── db.php
```

## Files Summary

| File | Main Concept | Explanation |
|---|---|---|
| 01 - Create Users Table.sql | Users table | Creates a `users` table for storing account data. |
| 02 - Register Form.php | Registration form | Displays a form for username, email, and password. |
| 03 - Store User with Password Hash.php | Register processing | Validates input, hashes password, and inserts user into MySQL. |
| 04 - Login Form.php | Login form | Displays a form for email and password. |
| 05 - Verify Password.php | Login processing | Checks the email, verifies password, and stores session data. |
| 06 - Protected Page.php | Session protection | Allows only logged-in users to access the page. |
| 07 - Logout.php | Logout | Clears session data and redirects user back to login. |
| includes/db.php | PDO connection | Stores reusable database connection code. |

## Important PHP Syntax in This Chapter

| Syntax | Meaning |
|---|---|
| `password_hash()` | Converts a plain password into a secure hashed password. |
| `password_verify()` | Checks whether a plain password matches the hashed password. |
| `session_start()` | Starts or resumes a PHP session. |
| `$_SESSION` | Stores user login data across pages. |
| `header("Location: page.php")` | Redirects the browser to another PHP page. |
| `exit` | Stops the script after redirecting. |
| `prepare()` | Prepares SQL safely before execution. |
| `execute()` | Runs a prepared SQL statement. |
| `fetch()` | Gets one row from the query result. |

## Database Setup

Before running the PHP files, create the database first.

Recommended database name:

```sql
php_note_db
```

Then run:

```text
01 - Create Users Table.sql
```

You can run the SQL file in phpMyAdmin.

## How to Run

1. Start Apache and MySQL in XAMPP.
2. Put the `PHP` folder inside `htdocs`.
3. Create the database and table using the SQL file.
4. Open `02 - Register Form.php` in the browser.
5. Register a user.
6. Open `04 - Login Form.php` and log in.
7. After successful login, the system redirects to `06 - Protected Page.php`.

## Important Security Notes

This chapter is for learning basic backend authentication. It already uses `password_hash()`, `password_verify()`, prepared statements, and `htmlspecialchars()`.

However, a real production login system may also need stronger protection such as CSRF protection, rate limiting, email verification, secure cookies, HTTPS, and better session settings.
