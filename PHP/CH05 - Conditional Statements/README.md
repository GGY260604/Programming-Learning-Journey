# CH05 - Conditional Statements

This chapter teaches how PHP makes decisions using conditional statements.

Conditional statements are important in backend development because the server often needs to decide what to do based on user input, database results, login status, form validation, or business rules.

## How to Run

1. Put the `PHP` folder inside your XAMPP `htdocs` folder.
2. Start Apache in XAMPP Control Panel.
3. Open the chapter files through `localhost`.

Example:

```text
http://localhost/PHP/CH05%20-%20Conditional%20Statements/01%20-%20If%20Statement.php
```

## Chapter Files

| File | Topic | Main Purpose |
|---|---|---|
| `01 - If Statement.php` | `if` statement | Learn how to run code only when a condition is true. |
| `02 - If Else Statement.php` | `if else` statement | Learn how to choose between two possible branches. |
| `03 - Else If Statement.php` | `elseif` statement | Learn how to check multiple conditions in order. |
| `04 - Nested If Statement.php` | Nested condition | Learn how to place one condition inside another condition. |
| `05 - Switch Statement.php` | `switch` statement | Learn how to compare one value against many cases. |
| `06 - Match Expression.php` | `match` expression | Learn a modern PHP expression for returning values from conditions. |

## Important Notes

- A condition usually returns either `true` or `false`.
- `if` is used when code should only run under a certain condition.
- `else` is used when the first condition is false.
- `elseif` is used when there are more than two possible conditions.
- `switch` is useful when checking one value against many possible cases.
- `match` is available in PHP 8.0 and above.
- In backend PHP, conditional statements are commonly used for validation, login checks, permission checks, and CRUD operation results.
