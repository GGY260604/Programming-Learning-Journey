# CH02 - Variables Data Types and Constants

This chapter introduces the basic building blocks used to store and manage values in PHP.

In backend development, variables are used everywhere. They can store form input, database results, login status, error messages, user roles, prices, dates, and many other values.

## How to Run

1. Start **Apache** in XAMPP.
2. Place the `PHP` folder inside `htdocs`.
3. Open the files through `localhost`.

Example:

```text
http://localhost/PHP/CH02%20-%20Variables%20Data%20Types%20and%20Constants/01%20-%20Variables.php
```

## Files in This Chapter

| File | Main Concept | What You Learn |
|---|---|---|
| `01 - Variables.php` | Variables | How to create, assign, reassign, and output PHP variables. |
| `02 - String Integer Float Boolean.php` | Basic data types | How PHP stores text, whole numbers, decimal numbers, and true/false values. |
| `03 - Null and Empty Values.php` | Null and empty values | How to compare `null`, empty string, zero, false, `isset()`, and `empty()`. |
| `04 - Constants.php` | Constants | How to create fixed values using `define()` and `const`. |
| `05 - Variable Scope Preview.php` | Variable scope | Basic preview of local, global, and static variables. |
| `06 - Type Checking.php` | Type checking | How to check data types using `gettype()`, `is_string()`, `is_int()`, and related functions. |

## Important Notes

- PHP variables start with the `$` symbol.
- PHP variable names are case-sensitive.
- PHP is loosely typed, so a variable can store different types of values at different times.
- Constants are useful for fixed values such as application name, tax rate, database host, or file paths.
- Type checking is important when handling user input from forms because input usually arrives as string data.
