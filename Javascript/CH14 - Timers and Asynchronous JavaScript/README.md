# CH14 - Timers and Asynchronous JavaScript

This chapter teaches JavaScript timing functions and asynchronous programming using executable HTML files.

## Chapter Goals

- Understand how `setTimeout()` runs code later.
- Understand how `setInterval()` repeats code.
- Learn how to stop timers using `clearTimeout()` and `clearInterval()`.
- Understand callback functions.
- Learn Promise basics using `resolve()` and `reject()`.
- Handle Promise results using `.then()`, `.catch()`, and `.finally()`.
- Write cleaner asynchronous code using `async` and `await`.
- Manage multiple asynchronous tasks using Promise combination methods.

## Files

| File | Main Topic | What You Learn |
|---|---|---|
| `01 - setTimeout.html` | `setTimeout()` | Run code once after a delay, pass arguments into a timeout callback, and understand execution order. |
| `02 - setInterval.html` | `setInterval()` | Repeat code at fixed intervals, create a simple clock, and stop repeated work. |
| `03 - clearTimeout and clearInterval.html` | Timer cancellation | Store timer IDs and cancel scheduled or repeating tasks. |
| `04 - Callback.html` | Callback function | Pass functions as arguments and run them later in normal and asynchronous situations. |
| `05 - Promise.html` | Promise basics | Create promises, use `resolve()`, use `reject()`, and understand promise states. |
| `06 - then catch and finally.html` | Promise handling | Chain `.then()`, handle errors with `.catch()`, and run cleanup code with `.finally()`. |
| `07 - async and await.html` | `async` / `await` | Write Promise-based code in a cleaner step-by-step style and handle async errors using `try...catch`. |
| `08 - Promise all race any and allSettled.html` | Promise combination methods | Compare `Promise.all()`, `Promise.race()`, `Promise.any()`, and `Promise.allSettled()`. |

## Important Notes

- Timer delays are written in milliseconds.
- `setTimeout()` runs once.
- `setInterval()` repeats until it is stopped.
- A callback is a function passed into another function.
- A Promise represents a value that may be available in the future.
- `async` functions always return a Promise.
- `await` can only be used inside an `async` function or a JavaScript module.

## Recommended Learning Order

1. Learn timers first: `setTimeout()` and `setInterval()`.
2. Learn callbacks because timers use callback functions.
3. Learn Promises because modern async JavaScript is Promise-based.
4. Learn `async` and `await` after understanding Promises.
5. Learn Promise combination methods last because they manage multiple Promises together.
