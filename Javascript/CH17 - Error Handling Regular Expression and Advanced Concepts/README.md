# CH17 - Error Handling Regular Expression and Advanced Concepts

This chapter teaches JavaScript topics that are useful after learning core syntax, DOM, events, forms, storage, asynchronous JavaScript, Fetch, modules, and OOP.

The files are executable HTML demos. Open each HTML file in a browser and use the buttons/inputs to test the behavior.

## Files

| File | Main Topic | What You Learn |
|---|---|---|
| `01 - try catch finally.html` | Error handling | How `try`, `catch`, and `finally` control risky code. |
| `02 - throw and Error Object.html` | Manual errors | How to use `throw` and `new Error()` for validation. |
| `03 - Custom Error.html` | Custom error class | How to extend `Error` and check errors using `instanceof`. |
| `04 - Strict Mode.html` | Strict mode | How `"use strict"` catches unsafe or accidental behavior. |
| `05 - Regular Expression Basics.html` | Regex basics | How regex patterns, anchors, character classes, and flags work. |
| `06 - test exec match replace and split.html` | Regex methods | How to use regex with `test`, `exec`, `match`, `replace`, and `split`. |
| `07 - this in Different Situations.html` | `this` keyword | How `this` changes in object methods, arrow functions, and event handlers. |
| `08 - call apply and bind.html` | Function context | How `call`, `apply`, and `bind` control the value of `this`. |
| `09 - Higher Order Function.html` | Advanced function concept | How functions can be passed as values and returned from other functions. |

## Learning Order

1. Start with error handling.
2. Learn manual errors and custom errors.
3. Learn strict mode because it affects how mistakes are detected.
4. Learn regular expressions for text validation and searching.
5. Learn advanced function behavior: `this`, `call`, `apply`, `bind`, and higher-order functions.

## Notes

- Regex examples in this chapter are for learning and demonstration.
- The email-like regex is intentionally simple. Real production email validation is more complicated.
- The `this` keyword depends on how a function is called, not only where it is written.
- `bind()` returns a new function, while `call()` and `apply()` run the function immediately.
