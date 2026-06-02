# CH25 - Security Basics for Backend PHP

This chapter teaches important security concepts for backend PHP development.

The goal of this chapter is not to make a perfect security system yet. The goal is to understand the basic security habits that should appear in real PHP backend projects.

## How to Run

1. Start Apache in XAMPP.
2. Put the `PHP` folder inside `htdocs`.
3. Open the files using `localhost`.
4. Example path:

```text
http://localhost/PHP/CH25%20-%20Security%20Basics%20for%20Backend%20PHP/01%20-%20Prevent%20SQL%20Injection.php
```

## Files in This Chapter

| File | Main Concept | What You Learn |
|---|---|---|
| 01 - Prevent SQL Injection.php | SQL injection prevention | Why direct SQL string building is dangerous and why prepared statements are safer. |
| 02 - Prevent XSS with htmlspecialchars.php | XSS prevention | Why user input must be escaped before displaying in HTML. |
| 03 - Validate Input.php | Input validation | How to check whether user input follows expected rules before using it. |
| 04 - Sanitize Input.php | Input sanitization | How to clean user input for safer processing. |
| 05 - Password Hashing.php | Password security | How to use `password_hash()` and `password_verify()`. |
| 06 - Session Protection.php | Session safety | How to use safer session habits, such as login checks and session regeneration. |
| 07 - CSRF Token Basic Demo.php | CSRF protection | How to generate and verify a token for form submission. |

## Important Security Notes

Security is not one single function. It is a habit across the whole system.

Common backend security habits include:

```text
- Do not trust user input.
- Validate input before using it.
- Escape output before displaying it in HTML.
- Use prepared statements for SQL.
- Hash passwords before storing them.
- Protect pages that require login.
- Use CSRF tokens for important forms.
```

## Important Difference

Validation and sanitization are related, but they are not the same.

| Concept | Meaning | Example |
|---|---|---|
| Validation | Check whether input is acceptable | Check whether email format is valid. |
| Sanitization | Clean or transform input | Remove unwanted characters or spaces. |

## Reminder

This chapter contains beginner-friendly examples. For real production systems, security should be handled more strictly and consistently across the whole application.
