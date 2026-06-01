# CH09 - Forms and User Input

This chapter teaches how PHP receives data from HTML forms.

In backend development, forms are one of the most important topics because users normally send data to the server through forms.

Examples:

- Login form
- Register form
- Search form
- Contact form
- Order form
- Update profile form
- Upload form

## Chapter Files

| No. | File | Main Concept |
|---|---|---|
| 01 | 01 - GET Form.php | Submit form data using the GET method |
| 02 | 02 - POST Form.php | Submit form data using the POST method |
| 03 | 03 - Text Input Handling.php | Read text, email, and number input |
| 04 | 04 - Radio Button Handling.php | Handle one selected value from radio buttons |
| 05 | 05 - Checkbox Handling.php | Handle multiple selected values from checkboxes |
| 06 | 06 - Select Option Handling.php | Handle dropdown list value |
| 07 | 07 - Textarea Handling.php | Handle long text input from textarea |
| 08 | 08 - Sticky Form Value.php | Keep user input after form submission |
| 09 | 09 - Basic Form Validation.php | Validate required fields before processing form data |

## Important PHP Superglobals in This Chapter

| Superglobal | Meaning |
|---|---|
| `$_GET` | Stores data submitted using `method="get"` |
| `$_POST` | Stores data submitted using `method="post"` |
| `$_REQUEST` | Can contain GET, POST, and COOKIE data, but it is usually better to use `$_GET` or `$_POST` directly |

## GET vs POST

| Method | Data Location | Common Use |
|---|---|---|
| GET | Data appears in the URL query string | Searching, filtering, viewing data |
| POST | Data is sent in the request body | Login, register, insert, update, delete actions |

## Important Security Reminder

User input should not be trusted directly.

When displaying user input back into HTML, use:

```php
htmlspecialchars($value)
```

This helps prevent HTML or JavaScript code from being executed in the browser.

## Short Echo Tag Reminder

After CH04, we can use the short echo tag to quickly display values:

```php
<?= htmlspecialchars($name) ?>
```

This is the shorter version of:

```php
<?php echo htmlspecialchars($name); ?>
```

For form values, remember that `<?= ?>` only outputs data. It does not automatically make data safe. You still need `htmlspecialchars()` when displaying user input.

## How to Run

1. Place the `PHP` folder inside your XAMPP `htdocs` folder.
2. Start Apache in XAMPP.
3. Open the file using `localhost` in your browser.

Example:

```text
http://localhost/PHP/CH09%20-%20Forms%20and%20User%20Input/01%20-%20GET%20Form.php
```
