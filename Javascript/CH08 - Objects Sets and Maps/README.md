# CH08 - Objects Sets and Maps

This chapter teaches object-based data structures in JavaScript.

The files are designed as executable HTML notes. Open each `.html` file in a browser and use the buttons to run the examples.

## File Summary

| File | Main Focus | Key Syntax / Methods |
|---|---|---|
| 01 - Object Literal.html | Creating objects with object literal syntax | `{}`, `key: value`, nested object, array inside object |
| 02 - Object Properties and Methods.html | Reading and changing object properties | dot notation, bracket notation, add property, update property, `delete`, object method |
| 03 - this Keyword in Object.html | Using `this` inside object methods | `this.property`, normal method syntax, arrow function behavior |
| 04 - Object Destructuring and Spread.html | Extracting and copying object properties | `{ name }`, `{ name: newName }`, default value, `{ ...object }` |
| 05 - Object.keys values and entries.html | Converting object data into arrays | `Object.keys()`, `Object.values()`, `Object.entries()` |
| 06 - Object Copying.html | Understanding reference copy, shallow copy, and deep copy | assignment reference, spread copy, `Object.assign()`, `structuredClone()` |
| 07 - Set.html | Storing unique values | `new Set()`, `add()`, `has()`, `delete()`, `clear()`, `size` |
| 08 - Map.html | Storing key-value data using Map | `new Map()`, `set()`, `get()`, `has()`, `delete()`, `clear()`, `size` |

## Learning Order

1. Start with object literal syntax.
2. Learn how to access and modify object properties.
3. Learn how `this` behaves in object methods.
4. Learn destructuring and spread for cleaner object code.
5. Learn object utility methods for looping object data.
6. Learn object copying to avoid accidental reference bugs.
7. Learn `Set` for unique values.
8. Learn `Map` for flexible key-value collections.

## Important Notes

- Use objects when you want to describe one thing with many related properties.
- Use arrays when order and index are important.
- Use Set when duplicate values should not exist.
- Use Map when you need key-value pairs with flexible key types.
- Object spread and `Object.assign()` only create shallow copies.
- Use `structuredClone()` when you need a deep copy for supported data types.
