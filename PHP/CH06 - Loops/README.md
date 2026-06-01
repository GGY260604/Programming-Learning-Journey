# CH06 - Loops

This chapter teaches the basic loop structures in PHP.

A loop is used when we want to repeat a block of code multiple times.
Instead of writing the same statement again and again, we can use a loop to make the code shorter and easier to maintain.

## Files in This Chapter

| No. | File Name | Main Concept |
|---|---|---|
| 01 | 01 - While Loop.php | Repeats code while a condition is true |
| 02 | 02 - Do While Loop.php | Runs code at least one time before checking the condition |
| 03 | 03 - For Loop.php | Repeats code using initialization, condition, and update in one line |
| 04 | 04 - Foreach Loop.php | Loops through arrays easily |
| 05 | 05 - Break and Continue.php | Controls loop flow using break and continue |
| 06 | 06 - Loop with HTML Table.php | Uses loops to generate repeated HTML output |

## How to Run

1. Start Apache in XAMPP.
2. Put the `PHP` folder inside the `htdocs` folder.
3. Open the chapter files using `localhost` in the browser.

Example path format:

```text
http://localhost/PHP/CH06%20-%20Loops/01%20-%20While%20Loop.php
```

## What You Should Learn

By the end of this chapter, you should understand:

- how to use `while`
- how to use `do while`
- how to use `for`
- how to use `foreach`
- how to stop a loop using `break`
- how to skip one loop cycle using `continue`
- how PHP loops can generate repeated HTML content

## Important Notes

A loop usually has three important parts:

1. Start value
2. Condition
3. Update statement

If the condition never becomes false, the loop may become an infinite loop.

For backend PHP development, loops are commonly used to:

- display database records
- process form input
- generate table rows
- read arrays
- build dynamic HTML output
