# CH10 - Superglobals

This chapter teaches PHP superglobals.

Superglobals are special built-in arrays that PHP creates automatically. They can be accessed from anywhere in a PHP file without using `global`.

## Chapter Files

| No. | File | Main Concept |
| --- | --- | --- |
| 01 | `01 - REQUEST.php` | Read request data using `$_REQUEST` and understand why it should be used carefully. |
| 02 | `02 - GET.php` | Read URL query string data using `$_GET`. |
| 03 | `03 - POST.php` | Read submitted form data using `$_POST`. |
| 04 | `04 - SERVER.php` | Read server and request information using `$_SERVER`. |
| 05 | `05 - FILES Preview.php` | Preview uploaded file information using `$_FILES`. |
| 06 | `06 - SESSION Preview.php` | Store temporary server-side data using `$_SESSION`. |
| 07 | `07 - COOKIE Preview.php` | Store and read small browser-side data using `$_COOKIE`. |

## Important Superglobals

| Superglobal | Meaning |
| --- | --- |
| `$_GET` | Data sent through the URL query string. |
| `$_POST` | Data sent through the request body, usually from a POST form. |
| `$_REQUEST` | Data from GET, POST, and COOKIE depending on PHP configuration. |
| `$_SERVER` | Server and request information. |
| `$_FILES` | Uploaded file information. |
| `$_SESSION` | Session data stored on the server side. |
| `$_COOKIE` | Cookie data stored in the browser. |

## Important Notes

- Always validate user input.
- Always escape output using `htmlspecialchars()` when displaying user-submitted data in HTML.
- `$_GET` is visible in the URL.
- `$_POST` is not shown in the URL, but it is not automatically secure.
- `$_SESSION` must use `session_start()` before output.
- `setcookie()` must run before HTML output.
- File upload forms must use `enctype="multipart/form-data"`.

## How to Run

Place the `PHP` folder inside XAMPP `htdocs`.

Example path:

```text
C:/xampp/htdocs/PHP/CH10 - Superglobals
```

Then open the files through localhost:

```text
http://localhost/PHP/CH10%20-%20Superglobals/01%20-%20REQUEST.php
```
