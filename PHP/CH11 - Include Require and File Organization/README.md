# CH11 - Include Require and File Organization

This chapter teaches how to split PHP code into reusable files.

In real backend development, we should not repeat the same header, footer, navigation, configuration, or helper functions in every page. PHP provides `include`, `require`, `include_once`, and `require_once` to load another PHP file into the current file.

## Chapter Files

| No. | File | Main Concept |
| --- | --- | --- |
| 01 | `01 - Include File.php` | Use `include` to load another PHP file and continue running even if the file is missing. |
| 02 | `02 - Require File.php` | Use `require` when the imported file is necessary for the page to work. |
| 03 | `03 - Include Header and Footer.php` | Reuse the same header and footer layout in a PHP page. |
| 04 | `04 - Reusable Navigation.php` | Reuse a navigation menu and highlight the current page. |
| 05 | `05 - Config File Concept.php` | Store project settings in a separate configuration file. |

## Included Files

| Folder/File | Purpose |
| --- | --- |
| `includes/site-message.php` | A small reusable message used by `include`. |
| `includes/site-config.php` | Required setting values used by `require`. |
| `includes/header.php` | Reusable HTML header and opening layout. |
| `includes/footer.php` | Reusable HTML footer and closing layout. |
| `includes/navigation.php` | Reusable navigation menu. |
| `includes/config.php` | Example project configuration file. |
| `includes/helpers.php` | Example reusable helper function file. |

## Important Keywords

| Keyword | Meaning |
| --- | --- |
| `include` | Loads another file. If the file is missing, PHP gives a warning but continues running. |
| `require` | Loads another file. If the file is missing, PHP gives an error and stops running. |
| `include_once` | Same as `include`, but loads the file only one time. |
| `require_once` | Same as `require`, but loads the file only one time. |
| `__DIR__` | Gives the directory path of the current PHP file. Useful for safer file paths. |

## Common Backend Usage

- Put database connection code in a reusable file.
- Put configuration values in a config file.
- Put helper functions in a helper file.
- Put repeated page layout, such as header and footer, in reusable files.
- Use `require_once` for important files that should not be loaded repeatedly.

## How to Run

Place the `PHP` folder inside XAMPP `htdocs`.

Example path:

```text
C:/xampp/htdocs/PHP/CH11 - Include Require and File Organization
```

Then open the files through localhost:

```text
http://localhost/PHP/CH11%20-%20Include%20Require%20and%20File%20Organization/01%20-%20Include%20File.php
```
