# CH13 - JSON Storage and Browser Data

This chapter teaches how JavaScript stores and transfers small pieces of data in the browser.

The focus is not only on the syntax, but also on the correct usage pattern:

- convert arrays and objects before storage
- read saved data safely
- remove saved data correctly
- understand the difference between local and session storage
- build and read query strings using URLSearchParams

## Files in this chapter

| File | Main focus | Important syntax / methods |
|---|---|---|
| `01 - JSON stringify and parse.html` | Convert JavaScript values to JSON text and back | `JSON.stringify()`, `JSON.parse()`, `try...catch` |
| `02 - localStorage.html` | Save persistent browser data | `localStorage.setItem()`, `localStorage.getItem()`, `localStorage.removeItem()` |
| `03 - sessionStorage.html` | Save temporary tab-based browser data | `sessionStorage.setItem()`, `sessionStorage.getItem()`, `sessionStorage.removeItem()` |
| `04 - Store Array and Object.html` | Store structured data safely | `JSON.stringify()`, `JSON.parse()`, arrays of objects |
| `05 - Remove and Clear Storage.html` | Remove one item or all saved items | `removeItem()`, `clear()`, `length`, `key()` |
| `06 - URLSearchParams.html` | Work with query string data in URLs | `URLSearchParams`, `get()`, `has()`, `set()`, `append()`, `delete()`, `getAll()`, `toString()` |

## Key idea

Browser storage can only store strings directly.

Because of that, this is the common pattern when saving arrays or objects:

```js
const jsonText = JSON.stringify(data);
localStorage.setItem("key", jsonText);
```

And this is the common pattern when reading them back:

```js
const jsonText = localStorage.getItem("key");
const data = JSON.parse(jsonText);
```

## localStorage vs sessionStorage

| Feature | localStorage | sessionStorage |
|---|---|---|
| Stores key-value pairs | Yes | Yes |
| Value type | String | String |
| Survives page refresh | Yes | Yes |
| Survives browser/tab close | Yes | No |
| Common use | Theme, small preferences, simple saved state | Temporary form state, temporary tab data |

## Important warning

Do not store sensitive data such as passwords, tokens, or private information in `localStorage` or `sessionStorage` for normal beginner projects.

These storage tools are useful for learning and small client-side features, but real authentication data should be handled carefully by the backend and security design.
