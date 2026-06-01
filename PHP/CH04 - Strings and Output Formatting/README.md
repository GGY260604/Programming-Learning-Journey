# CH04 - Strings and Output Formatting

This chapter teaches how PHP handles strings and how PHP output can be formatted safely.

The goal is to run each file in the browser and observe how different string syntax affects the output.

## How to Run

1. Put the `PHP` folder inside your XAMPP `htdocs` folder.
2. Start Apache in XAMPP Control Panel.
3. Open the chapter files through `localhost`.

Example:

```text
http://localhost/PHP/CH04%20-%20Strings%20and%20Output%20Formatting/01%20-%20String%20Concatenation.php
```

## Chapter Files

| File | Topic | Main Purpose |
|---|---|---|
| `01 - String Concatenation.php` | Concatenation | Learn how to join strings and variables using `.` and `.=`. |
| `02 - Double Quote vs Single Quote.php` | Quote difference | Learn how variables behave inside double quotes and single quotes. |
| `03 - Common String Functions.php` | String functions | Learn common functions such as `strlen`, `strtoupper`, `strtolower`, `trim`, `substr`, and `str_replace`. |
| `04 - Escape Characters.php` | Escape characters | Learn how to write quotation marks, backslashes, tabs, and new lines inside strings. |
| `05 - Heredoc and Nowdoc.php` | Multiline strings | Learn how heredoc and nowdoc can store long text. |
| `06 - Output HTML Safely.php` | Safe output | Learn why `htmlspecialchars` is important when displaying user input. |
| `07 - Short Echo Tag.php` | Short echo tag | Learn how `<?= ?>` quickly outputs values inside HTML. |

## Important Notes

- A string is text data.
- In PHP, strings can be written using single quotes, double quotes, heredoc, or nowdoc.
- Double-quoted strings can read variable values directly.
- Single-quoted strings treat most content as normal text.
- The concatenation operator in PHP is the dot symbol `.`.
- When displaying user input in HTML, use `htmlspecialchars` to reduce XSS risk.
- `<?= ?>` is a short way to write `<?php echo ...; ?>` when outputting values inside HTML.