# CH07 - Arrays

This chapter teaches JavaScript arrays through executable HTML examples.

Arrays are used to store multiple values in one variable. This chapter starts from basic array creation and access, then moves to common array methods such as `push()`, `pop()`, `slice()`, `splice()`, `find()`, `map()`, `filter()`, `reduce()`, `sort()`, and modern syntax such as destructuring and spread.

## Files

| File | Main Focus |
|---|---|
| `01 - Array Creation and Access.html` | Array literals, `new Array()`, index access, `length`, `at()`, and `Array.isArray()` |
| `02 - Add Update and Remove Array Items.html` | Updating by index, adding by index, and why `delete` is not preferred for arrays |
| `03 - push pop shift unshift.html` | Add/remove items from the beginning and end of an array |
| `04 - slice splice concat.html` | Copy part of an array, change the original array, and combine arrays |
| `05 - indexOf includes find and findIndex.html` | Search simple values and objects inside arrays |
| `06 - forEach map filter.html` | Run actions, transform arrays, and select matching items |
| `07 - reduce some every.html` | Calculate totals, create summaries, and check conditions |
| `08 - sort reverse and toSorted.html` | Sort arrays, reverse arrays, and understand mutating vs non-mutating sorting |
| `09 - Array Destructuring and Spread.html` | Extract array values, collect remaining items, copy arrays, and combine arrays |

## Important Array Properties and Methods Covered

| Property / Method | Use |
|---|---|
| `length` | Returns the number of slots in an array |
| `at()` | Gets an item by position, including negative positions such as `-1` |
| `Array.isArray()` | Checks whether a value is an array |
| `push()` | Adds item to the end |
| `pop()` | Removes item from the end |
| `unshift()` | Adds item to the beginning |
| `shift()` | Removes item from the beginning |
| `slice()` | Returns a copied part of an array without changing the original |
| `splice()` | Adds, removes, or replaces items in the original array |
| `concat()` | Combines arrays and returns a new array |
| `indexOf()` | Returns the index of a simple value or `-1` |
| `includes()` | Checks whether a simple value exists |
| `find()` | Returns the first item that matches a condition |
| `findIndex()` | Returns the index of the first item that matches a condition |
| `forEach()` | Runs a function for each item |
| `map()` | Creates a new transformed array |
| `filter()` | Creates a new array containing items that pass a condition |
| `reduce()` | Combines array items into one final result |
| `some()` | Checks whether at least one item passes a condition |
| `every()` | Checks whether all items pass a condition |
| `sort()` | Sorts the original array |
| `reverse()` | Reverses the original array |
| `toSorted()` | Creates a sorted copy in modern browsers |

## Suggested Learning Order

1. Start with file 01 to understand what arrays are.
2. Continue with files 02 to 04 to learn basic array modification.
3. Use file 05 to learn searching.
4. Use files 06 and 07 to learn callback-based array methods.
5. Finish with files 08 and 09 to learn sorting and modern syntax.

## Notes

- Many array methods use callback functions.
- Some methods change the original array, such as `push()`, `pop()`, `splice()`, `sort()`, and `reverse()`.
- Some methods return a new array, such as `slice()`, `concat()`, `map()`, `filter()`, and `toSorted()`.
- In real projects, understanding whether a method changes the original array is very important.
