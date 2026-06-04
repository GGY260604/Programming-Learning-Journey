# CH09 - DOM Selection and Content

This chapter introduces how JavaScript selects HTML elements and reads or changes their content.

## Files in this chapter

| File | Main Focus | Important Syntax |
|---|---|---|
| 01 - getElementById.html | Select one element by unique id | `document.getElementById("id")` |
| 02 - getElementsByClassName and TagName.html | Select multiple elements by class or tag | `getElementsByClassName()`, `getElementsByTagName()` |
| 03 - querySelector and querySelectorAll.html | Select elements using CSS selector syntax | `querySelector()`, `querySelectorAll()` |
| 04 - NodeList vs HTMLCollection.html | Compare DOM collection types | live `HTMLCollection`, static `NodeList` |
| 05 - textContent innerText and innerHTML.html | Read and write element content | `textContent`, `innerText`, `innerHTML` |
| 06 - value Property.html | Read and change form control values | `input.value`, `select.value`, `textarea.value` |
| 07 - getAttribute setAttribute and dataset.html | Work with HTML attributes and custom data | `getAttribute()`, `setAttribute()`, `dataset` |

## Learning order

Start with `getElementById()` because it selects one exact element. Then learn class, tag, and CSS-selector based selection. After you know how to select elements, continue to content properties, form values, and attributes.

## Key ideas

- DOM means Document Object Model.
- JavaScript can select HTML elements and treat them as objects.
- `getElementById()` returns one element or `null`.
- `getElementsByClassName()` and `getElementsByTagName()` return an `HTMLCollection`.
- `querySelector()` returns the first matching element.
- `querySelectorAll()` returns a `NodeList` of all matching elements.
- `textContent` is usually safer for normal text.
- `innerHTML` should be used carefully because it interprets HTML markup.
- Form controls usually use the `value` property.
- `data-*` attributes can be accessed through `element.dataset`.

## Practice suggestion

After opening each file in the browser, click every button and observe the output box. Then edit the HTML elements and see how the JavaScript selection result changes.
