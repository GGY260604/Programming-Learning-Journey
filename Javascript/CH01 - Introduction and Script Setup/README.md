# CH01 - Introduction and Script Setup

This chapter introduces JavaScript as the behavior layer of a web page.

The goal is not to teach all JavaScript syntax yet. The goal is to understand how JavaScript is connected to HTML and how a script runs in the browser.

## Chapter Files

| File | Purpose |
|---|---|
| `01 - What JavaScript Can Do.html` | Demonstrates common JavaScript abilities: changing text, image attributes, styles, classes, and reading input. |
| `02 - Internal JavaScript.html` | Shows JavaScript written directly inside the HTML file using the `<script>` element. |
| `03 - External JavaScript.html` | Shows how to connect an external `.js` file to HTML. |
| `03 - app.js` | External JavaScript file used by `03 - External JavaScript.html`. |
| `04 - Script Loading Order.html` | Demonstrates that normal scripts run from top to bottom and why script position matters. |
| `05 - defer and async.html` | Compares `defer` and `async` for loading external scripts. |
| `05 - defer-demo.js` | External script loaded with `defer`. |
| `05 - async-demo.js` | External script loaded with `async`. |
| `style.css` | Chapter-level CSS used only to make the examples readable. |

## Key Ideas

### 1. JavaScript changes behavior

HTML gives the page structure, CSS controls the style, and JavaScript controls the behavior.

JavaScript can:

- change text content
- change attributes
- change styles
- add or remove CSS classes
- read user input
- react to button clicks

### 2. Internal JavaScript

Internal JavaScript is written inside a `<script>` element in the same HTML file.

It is useful for small examples and learning, but it is not the best choice for larger projects.

### 3. External JavaScript

External JavaScript is written in a separate `.js` file and connected using the `src` attribute.

Example:

```html
<script src="app.js"></script>
```

This keeps the project cleaner because HTML and JavaScript are separated.

### 4. Script loading order matters

A normal script runs immediately when the browser reaches it.

If a script tries to select an HTML element before the browser has created that element, the result may be `null`.

For beginner examples, placing the script before the closing `</body>` tag is usually safe.

### 5. defer vs async

| Attribute | Meaning | Common Use |
|---|---|---|
| `defer` | Downloads while HTML is being parsed, then runs after HTML parsing is complete. | Main page scripts that need HTML elements. |
| `async` | Downloads while HTML is being parsed, then runs as soon as it finishes downloading. | Independent scripts that do not depend on the page structure. |

## Recommended Learning Order

1. Open `01 - What JavaScript Can Do.html`.
2. Try every button.
3. Open the source code and read the comments.
4. Continue file by file until `05 - defer and async.html`.
5. Open the browser console when studying loading order.
