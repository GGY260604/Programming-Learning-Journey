# CH15 - Error Handling and Debugging

This chapter teaches basic error handling and debugging in PHP.

When building backend systems, errors can happen because of invalid input, missing files, wrong database configuration, failed connection, incorrect logic, or unexpected user actions.

A good PHP backend should not simply crash. It should detect problems, handle them properly, and show a clear message when needed.

## Files in This Chapter

| No. | File | Main Concept |
| --- | --- | --- |
| 01 | 01 - Display Error Setting.php | Control whether PHP displays errors during development |
| 02 | 02 - Try Catch.php | Use `try`, `catch`, and `Exception` to handle risky code |
| 03 | 03 - Throw Exception.php | Manually throw an exception when data is invalid |
| 04 | 04 - Custom Error Message.php | Create user-friendly error messages for form validation |
| 05 | 05 - Debug with var_dump.php | Inspect variables using `var_dump()`, `print_r()`, and `gettype()` |

## Important Concepts

| Concept | Meaning |
| --- | --- |
| `error_reporting()` | Decides which types of PHP errors should be reported |
| `ini_set()` | Changes a PHP configuration value during runtime |
| `try` | Contains code that may produce an error or exception |
| `catch` | Handles the exception if one is thrown |
| `throw` | Manually creates an exception |
| `Exception` | A PHP object that represents an error situation |
| `var_dump()` | Displays detailed information about a variable |
| `print_r()` | Displays readable information about arrays or objects |
| `gettype()` | Returns the data type of a variable |

## Development vs Production

During development, it is useful to display errors because you need to know what went wrong.

In production, detailed errors should usually not be shown to users because they may reveal sensitive system information.

A common idea is:

```php
// Development
ini_set("display_errors", "1");
error_reporting(E_ALL);

// Production
ini_set("display_errors", "0");
```

## Important Reminder

Error handling is not only about fixing broken code.

It is also about making your backend safer, clearer, and easier to maintain.

When you continue to the database chapters, error handling becomes very important because database connection, SQL execution, and user input validation may all fail.

## How to Run

1. Put the `PHP` folder inside XAMPP `htdocs`.
2. Start Apache from XAMPP Control Panel.
3. Open the file through `localhost`.
4. Do not run these files by double-clicking them directly.

Example path format:

```text
http://localhost/PHP/CH15%20-%20Error%20Handling%20and%20Debugging/01%20-%20Display%20Error%20Setting.php
```
