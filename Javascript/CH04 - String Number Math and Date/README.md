# CH04 - String Number Math and Date

This chapter teaches common built-in JavaScript tools for text, numbers, mathematics, and dates.

The goal is not only to memorize method names, but to understand what each method is useful for in a real web page.

## Files

| File | Main focus | Important syntax / methods |
|---|---|---|
| `01 - String Basics.html` | Creating strings and accessing characters | `'text'`, `"text"`, `` `text` ``, `length`, `word[index]` |
| `02 - Template Literals.html` | Building strings with variables and expressions | Backticks, `${expression}`, multi-line strings |
| `03 - String Properties and Methods.html` | Common text processing methods | `trim()`, `includes()`, `indexOf()`, `slice()`, `replace()`, `replaceAll()`, `split()`, `toUpperCase()`, `toLowerCase()` |
| `04 - Number Basics and Methods.html` | Number formatting and checking | `Number.isFinite()`, `Number.isInteger()`, `toFixed()`, `toPrecision()`, `toString()` |
| `05 - parseInt parseFloat and Number.html` | Converting strings to numbers | `Number()`, `parseInt()`, `parseFloat()`, `Number.isNaN()` |
| `06 - Math Object.html` | Mathematical operations | `Math.round()`, `Math.floor()`, `Math.ceil()`, `Math.trunc()`, `Math.random()`, `Math.max()`, `Math.min()`, `Math.pow()`, `Math.sqrt()` |
| `07 - Date Object.html` | Creating and reading Date objects | `new Date()`, `getFullYear()`, `getMonth()`, `getDate()`, `getDay()`, `getTime()` |
| `08 - Date Formatting.html` | Displaying dates in readable formats | `toLocaleDateString()`, `toLocaleTimeString()`, `toLocaleString()`, `Intl.DateTimeFormat`, `padStart()` |

## Learning order

1. Start with string basics.
2. Learn template literals because they make output easier.
3. Learn string methods for processing text.
4. Learn number formatting and conversion.
5. Learn the Math object for calculations and random values.
6. Learn Date object basics.
7. Learn date formatting for user-friendly display.

## Notes

- Input values from HTML forms are usually strings, even when the input type is `number`.
- Use `Number()` when the whole input must be a valid number.
- Use `parseInt()` or `parseFloat()` when reading a number from the beginning of a string.
- Remember that `getMonth()` starts from `0`, so January is `0` and December is `11`.
- Use date formatting methods when showing dates to users instead of displaying raw Date objects.
