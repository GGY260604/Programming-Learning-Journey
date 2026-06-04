# CH02 - Output Input and Console

This chapter teaches the basic ways JavaScript can display output and receive simple input.

The goal is not to build complex forms yet. The goal is to understand how JavaScript communicates with the developer, the browser, the HTML page, and the user.

## Files in this chapter

| File | Main Topic | What You Learn |
|---|---|---|
| `01 - console.log and Console Methods.html` | Browser console | How to use `console.log()`, `console.info()`, `console.warn()`, `console.error()`, `console.table()`, and `console.clear()` for debugging. |
| `02 - alert confirm and prompt.html` | Browser popups | How to use `alert()`, `confirm()`, and `prompt()` to communicate with the user through simple popups. |
| `03 - Display Output in HTML.html` | HTML output | How to display output using `textContent`, `innerHTML`, and `value`. |
| `04 - Reading User Input.html` | Simple input | How to read input using `.value`, clean text with `trim()`, convert values with `Number()`, and display calculated output. |

## Important notes

- `console.log()` is mainly for developers.
- `alert()`, `confirm()`, and `prompt()` are simple but interrupt the page.
- `textContent` is safer for normal text output.
- `innerHTML` can display HTML tags, but should not be used with untrusted user input.
- `value` is used for form elements such as `input` and `textarea`.
- Input values are commonly read as strings, so numeric input may need conversion.

## Suggested learning order

1. Start with the console because it helps you debug JavaScript.
2. Learn popup functions because they are simple ways to interact with users.
3. Learn page output because real websites usually display results inside HTML.
4. Learn basic input reading because it prepares you for forms, events, and DOM manipulation.
