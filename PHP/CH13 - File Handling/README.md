# CH13 - File Handling

This chapter teaches how PHP reads from and writes to files.

File handling is useful when you want to store simple data without a database, read text files, process CSV files, or generate output files.

## Files in This Chapter

| No. | File | Main Concept |
| --- | --- | --- |
| 01 | 01 - Read Text File.php | Read content from a text file using `file_get_contents()` |
| 02 | 02 - Write Text File.php | Write content into a file using `file_put_contents()` |
| 03 | 03 - Append Text File.php | Add new content to the end of an existing file |
| 04 | 04 - Check File Exists.php | Check whether a file exists before reading it |
| 05 | 05 - Read CSV File.php | Read comma-separated data using `fopen()` and `fgetcsv()` |
| 06 | 06 - Write CSV File.php | Write structured data into a CSV file using `fputcsv()` |

## Folder Used in This Chapter

```text
CH13 - File Handling/
└── data/
    ├── sample-read.txt
    ├── students.csv
    ├── generated-note.txt
    ├── append-log.txt
    └── generated-students.csv
```

The `data` folder stores the files used by the PHP examples.

## Important Notes

When working with files, PHP needs the correct file path.

This chapter uses `__DIR__` often:

```php
$filePath = __DIR__ . "/data/sample-read.txt";
```

`__DIR__` means the directory of the current PHP file.

This is safer than writing only:

```php
$filePath = "data/sample-read.txt";
```

because relative paths can behave differently depending on how the script is executed.

## Common File Functions

| Function | Purpose |
| --- | --- |
| `file_get_contents()` | Read the whole file into a string |
| `file_put_contents()` | Write a string into a file |
| `FILE_APPEND` | Add new content without replacing old content |
| `file_exists()` | Check whether a file exists |
| `fopen()` | Open a file resource |
| `fgetcsv()` | Read one CSV row at a time |
| `fputcsv()` | Write one CSV row into a file |
| `fclose()` | Close an opened file resource |

## How to Run

1. Put the `PHP` folder inside XAMPP `htdocs`.
2. Start Apache from XAMPP Control Panel.
3. Open the file through `localhost`.
4. Do not run these files by double-clicking them directly.

Example path format:

```text
http://localhost/PHP/CH13%20-%20File%20Handling/01%20-%20Read%20Text%20File.php
```
