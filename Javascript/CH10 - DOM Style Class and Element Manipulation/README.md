# CH10 - DOM Style Class and Element Manipulation

This chapter teaches how JavaScript changes the visible HTML page after it has loaded.

The chapter focuses on DOM manipulation after selection has already been introduced in CH09.

## Files

| File | Main concept | What you practise |
|---|---|---|
| 01 - style Property.html | `element.style` | Change inline CSS using JavaScript |
| 02 - className and classList.html | `className`, `classList` | Add, remove, toggle, and check classes |
| 03 - createElement.html | `document.createElement()` | Create new elements and insert them into the page |
| 04 - append prepend before and after.html | DOM insertion methods | Insert elements at different positions |
| 05 - remove and replaceWith.html | `remove()`, `replaceWith()` | Delete and replace page elements |
| 06 - cloneNode.html | `cloneNode(false)`, `cloneNode(true)` | Duplicate shallow and deep elements |
| 07 - template Element.html | `<template>` | Build reusable HTML blueprints |

## Important notes

- `element.style` changes inline CSS directly.
- `classList` is usually cleaner than writing many inline styles.
- `createElement()` only creates the element in memory. The element appears only after insertion.
- `append()` and `prepend()` insert inside the selected element.
- `before()` and `after()` insert outside the selected element.
- `remove()` deletes an element from the current DOM.
- `replaceWith()` swaps one element with another.
- `cloneNode(true)` copies child elements, while `cloneNode(false)` does not.
- `<template>` is useful when you need to create repeated card or list structures.

## Recommended learning order

Study the files in numeric order because each file builds on the previous DOM manipulation concept.
