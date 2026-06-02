# CH18 - MySQL Select and Display Data

This chapter teaches how to retrieve data from a MySQL database using PHP PDO.

Before running this chapter, make sure you already completed CH16 and created the database named `php_note_db` with the `students` table.

This chapter also uses the reusable database connection idea from CH17.

## Files in This Chapter

| No. | File | Main Concept |
| --- | --- | --- |
| 01 | 01 - Select All Records.php | Use `SELECT` to retrieve all records from a table |
| 02 | 02 - Display Records in HTML Table.php | Display database records inside an HTML table |
| 03 | 03 - Select One Record by ID.php | Use a prepared statement to select one record by ID |
| 04 | 04 - Search Records.php | Search records using `LIKE` and a prepared statement |
| 05 | 05 - Sort Records.php | Sort selected records using `ORDER BY` safely |
| 06 | 06 - Limit Records.php | Limit how many records are displayed using `LIMIT` |
| 07 | includes/db.php | Store reusable PDO connection logic for this chapter |

## Database Used in This Chapter

| Item | Value |
| --- | --- |
| Database name | `php_note_db` |
| Table name | `students` |
| Main primary key | `student_id` |
| Connection style | PDO |

## Expected Table Columns

The examples expect the `students` table to have these columns:

| Column | Meaning |
| --- | --- |
| `student_id` | Unique ID of each student |
| `student_name` | Student name |
| `email` | Student email |
| `course` | Course name |
| `age` | Student age |

## Important Concepts

| Concept | Meaning |
| --- | --- |
| `SELECT` | SQL command used to retrieve data |
| `query()` | PDO method that can run a simple SQL statement directly |
| `prepare()` | PDO method used to prepare SQL before inserting external values |
| `execute()` | Runs a prepared statement |
| `fetch()` | Gets one row from the result |
| `fetchAll()` | Gets all rows from the result |
| `PDO::FETCH_ASSOC` | Returns each row as an associative array |
| `LIKE` | SQL operator used for pattern searching |
| `ORDER BY` | SQL clause used to sort records |
| `LIMIT` | SQL clause used to restrict the number of returned records |
| `htmlspecialchars()` | Protects HTML output from unsafe characters |
| Whitelist | A list of allowed values used to prevent unsafe dynamic SQL |

## Suggested Learning Order

Run the files in this order:

```text
01 - Select All Records.php
02 - Display Records in HTML Table.php
03 - Select One Record by ID.php
04 - Search Records.php
05 - Sort Records.php
06 - Limit Records.php
```

## Important Reminder

When SQL contains user input, use prepared statements.

For example, this chapter uses prepared statements for selecting by ID and searching by keyword.

For dynamic column names in `ORDER BY`, prepared statements cannot bind column names directly. Therefore, this chapter uses a whitelist to allow only approved column names.
