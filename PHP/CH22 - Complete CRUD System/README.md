# CH22 - Complete CRUD System

This chapter combines the previous database lessons into complete CRUD systems.

CRUD means:

| Letter | Meaning | SQL Command |
|---|---|---|
| C | Create | INSERT |
| R | Read | SELECT |
| U | Update | UPDATE |
| D | Delete | DELETE |

## Folder Structure

```text
PHP/
└── CH22 - Complete CRUD System/
    ├── README.md
    ├── style.css
    ├── 01 - Student CRUD/
    │   ├── 01 - index.php
    │   ├── 02 - create.php
    │   ├── 03 - store.php
    │   ├── 04 - edit.php
    │   ├── 05 - update.php
    │   ├── 06 - delete.php
    │   ├── includes/
    │   │   └── db.php
    │   └── sql/
    │       └── database.sql
    │
    └── 02 - Product CRUD/
        ├── 01 - index.php
        ├── 02 - create.php
        ├── 03 - store.php
        ├── 04 - edit.php
        ├── 05 - update.php
        ├── 06 - delete.php
        ├── includes/
        │   └── db.php
        └── sql/
            └── database.sql
```

## What You Will Learn

| File | Purpose |
|---|---|
| 01 - index.php | Display all records from the database |
| 02 - create.php | Show a form for adding a new record |
| 03 - store.php | Receive form data and insert it into the database |
| 04 - edit.php | Get one existing record and show it in an edit form |
| 05 - update.php | Receive edited form data and update the database |
| 06 - delete.php | Confirm and delete one record safely |
| includes/db.php | Store reusable PDO database connection code |
| sql/database.sql | Provide SQL setup code for the table |

## Database Requirement

These examples use the database name:

```sql
php_note_db
```

You can create this database in phpMyAdmin or run the SQL file inside each `sql` folder.

The `includes/db.php` file also uses `CREATE TABLE IF NOT EXISTS`, so the table will be created automatically if the database already exists.

## How to Run

1. Start Apache and MySQL in XAMPP.
2. Create a database named `php_note_db`.
3. Put the `PHP` folder inside `htdocs`.
4. Open one of the CRUD systems through localhost.

Example paths:

```text
http://localhost/PHP/CH22%20-%20Complete%20CRUD%20System/01%20-%20Student%20CRUD/01%20-%20index.php
http://localhost/PHP/CH22%20-%20Complete%20CRUD%20System/02%20-%20Product%20CRUD/01%20-%20index.php
```

## Important Notes

- `index.php` usually displays records.
- `create.php` usually displays the insert form.
- `store.php` usually handles the insert process.
- `edit.php` usually displays the update form.
- `update.php` usually handles the update process.
- `delete.php` usually handles delete confirmation and delete process.
- Prepared statements are used to prevent SQL injection.
- `htmlspecialchars()` is used when displaying database values in HTML.
- `<?= ?>` is used to quickly output safe values inside HTML.
