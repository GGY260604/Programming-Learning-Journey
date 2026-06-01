# CH01 - PHP Introduction and Setup

This chapter introduces the basic idea of PHP and how PHP runs inside a web server environment such as XAMPP.

## Chapter Goal

By the end of this chapter, you should understand:

| File | Main Concept |
|---|---|
| `01 - First PHP Script.php` | How to write and run a basic PHP script |
| `02 - PHP Inside HTML.php` | How PHP can be embedded inside an HTML page |
| `03 - Echo and Print.php` | How to output text using `echo` and `print` |
| `04 - PHP Comments.php` | How to write comments in PHP safely |
| `05 - PHP Info Page.php` | How to check PHP configuration using `phpinfo()` |

## How to Run

1. Start **Apache** in XAMPP.
2. Put the whole `PHP` folder inside:

   ```text
   C:\xampp\htdocs\
   ```

3. Open your browser.
4. Visit the Chapter 01 files using this style of URL:

   ```text
   http://localhost/PHP/CH01%20-%20PHP%20Introduction%20and%20Setup/01%20-%20First%20PHP%20Script.php
   ```

## Important Note About PHP Tags in Comments

In a `.php` file, the PHP server can still detect raw PHP tags such as:

```text
<?php echo "Hello World"; ?>
```

Because of that, when we want to show PHP tags inside an HTML comment, we write them as escaped text:

```html
<!-- &lt;?php echo "Hello World"; ?&gt; -->
```

This prevents the PHP server from treating the example as real PHP code.