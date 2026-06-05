# CH16 - Modules Classes and OOP

This chapter teaches two important modern JavaScript areas:

1. **Modules** - splitting JavaScript code into different files using `export` and `import`.
2. **Classes and OOP** - creating objects using class syntax, constructors, methods, static members, getters, setters, private fields, inheritance, and overriding.

## Important module note

The module examples use:

```html
<script type="module" src="..."></script>
```

When a JavaScript file imports another JavaScript file, most browsers expect the files to be opened from a local server, not directly using `file://`.

Recommended ways to run the module files:

- VS Code Live Server extension
- PHP Server extension
- Any simple local server

## Files in this chapter

| File | Main concept |
|---|---|
| `01 - Module Script.html` | How to use `<script type="module">` and import from another file |
| `01 - main.js` | Main module file for File 01 |
| `01 - math.js` | Exported functions for File 01 |
| `02 - Named Export and Import.html` | Named exports and named imports |
| `02 - main.js` | Main module file for File 02 |
| `02 - helper.js` | Multiple named exports for File 02 |
| `03 - Default Export.html` | Default export and import |
| `03 - main.js` | Main module file for File 03 |
| `03 - user.js` | Default exported function for File 03 |
| `04 - Class and Object.html` | Class syntax and creating objects |
| `05 - Constructor and Methods.html` | Constructor and instance methods |
| `06 - Static Method and Property.html` | Static members that belong to the class itself |
| `07 - Getter Setter and Private Field.html` | Getter, setter, and private class fields |
| `08 - Inheritance and Overriding.html` | `extends`, `super`, and method overriding |

## Suggested learning order

Start with the module files first, then continue to the OOP files.

```text
01 -> 02 -> 03 -> 04 -> 05 -> 06 -> 07 -> 08
```

## Key ideas

- Use modules when your JavaScript project becomes too large for one file.
- Use `export` to share values from a file.
- Use `import` to receive values from another file.
- Use classes when you want to create many similar objects.
- Use `constructor` to set up object data.
- Use instance methods for behavior that belongs to each object.
- Use static methods when the behavior belongs to the class itself.
- Use private fields when data should not be accessed directly from outside the class.
- Use inheritance when a class is a more specific type of another class.
