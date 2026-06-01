# CH12 - Sessions Cookies and Basic Login Concept

This chapter teaches how PHP remembers user information across page requests.

Normal PHP variables disappear after the page finishes loading. Sessions and cookies solve this problem in different ways.

## Files in This Chapter

| No. | File | Main Concept |
| --- | --- | --- |
| 01 | 01 - Start Session.php | Start a PHP session using `session_start()` |
| 02 | 02 - Store Session Data.php | Save and read values from `$_SESSION` |
| 03 | 03 - Destroy Session.php | Remove session data and log out a user conceptually |
| 04 | 04 - Create Cookie.php | Create a browser cookie using `setcookie()` |
| 05 | 05 - Read Cookie.php | Read cookie values using `$_COOKIE` |
| 06 | 06 - Delete Cookie.php | Delete a cookie by setting it to an expired time |
| 07 | 07 - Simple Session Login Demo.php | Build a basic login demo using sessions |

## Important Notes

Session code usually needs this at the top of the PHP file:

```php
session_start();
```

Cookie creation usually uses:

```php
setcookie("name", "value", time() + 3600, "/");
```

`session_start()` and `setcookie()` should run before normal HTML output is sent to the browser.

## Session vs Cookie

| Feature | Session | Cookie |
| --- | --- | --- |
| Stored where? | Server side | Browser side |
| Accessed by PHP using | `$_SESSION` | `$_COOKIE` |
| Common use | Login state, temporary user data | Preferences, remember settings |
| More suitable for sensitive data? | Yes, but still must be protected carefully | No, users can inspect or edit cookies |

## How to Run

1. Put the `PHP` folder inside XAMPP `htdocs`.
2. Start Apache from XAMPP Control Panel.
3. Open the file through `localhost`.
4. Do not run these files by double-clicking them directly.

Example path format:

```text
http://localhost/PHP/CH12%20-%20Sessions%20Cookies%20and%20Basic%20Login%20Concept/01%20-%20Start%20Session.php
```
