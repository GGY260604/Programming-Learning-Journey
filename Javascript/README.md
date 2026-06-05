# JavaScript

A complete executable JavaScript programming note built with organized HTML demo files.

This project is not designed as a normal theory-only note. Each chapter contains runnable `.html` files that demonstrate JavaScript syntax, methods, browser behavior, DOM manipulation, events, forms, storage, asynchronous programming, modules, classes, error handling, regular expressions, and advanced concepts.

The goal is to learn JavaScript by opening the files, reading the comments, clicking the buttons, changing the code, and observing the result directly in the browser.

---

## Project Structure

```text
JavaScript/
├── CH01 - Introduction and Script Setup/
├── CH02 - Output Input and Console/
├── CH03 - Variables Data Types and Operators/
├── CH04 - String Number Math and Date/
├── CH05 - Control Flow and Loops/
├── CH06 - Functions/
├── CH07 - Arrays/
├── CH08 - Objects Sets and Maps/
├── CH09 - DOM Selection and Content/
├── CH10 - DOM Style Class and Element Manipulation/
├── CH11 - Events/
├── CH12 - Forms and Validation/
├── CH13 - JSON Storage and Browser Data/
├── CH14 - Timers and Asynchronous JavaScript/
├── CH15 - Fetch API and HTTP Request/
├── CH16 - Modules Classes and OOP/
├── CH17 - Error Handling Regular Expression and Advanced Concepts/
└── README.md
```

This project intentionally ends at **CH17**. Mini projects are not included in this version.

---

## Naming Convention

### Folder Naming

Each topic is stored inside one chapter folder.

```text
CH01 - Topic Name
CH02 - Topic Name
CH03 - Topic Name
```

### File Naming

Each lesson file starts with a number, followed by a clear file name.

```text
01 - File Name.html
02 - File Name.html
03 - File Name.html
```

For lessons that need supporting JavaScript files, the same number is reused.

```text
03 - External JavaScript.html
03 - app.js
```

This means both files belong to the same lesson.

---

## How to Use This Note

### Normal HTML Lessons

Most files can be opened directly by double-clicking the `.html` file.

```text
Open the chapter folder
Open the HTML file
Read the comments
Click the buttons
Change the code
Refresh the browser
```

### Lessons with JavaScript Modules

Files that use `type="module"` should be opened through a local server instead of directly using `file://`.

Recommended options:

```text
Option 1: Use VS Code Live Server
Option 2: Use a PHP/HTML local server
Option 3: Use Python simple server
```

Python example:

```bash
python -m http.server 5500
```

Then open:

```text
http://localhost:5500
```

### Lessons with Fetch API

Some Fetch API examples may require internet access because they request online JSON data from a public API.

If the request fails, check:

```text
1. Internet connection
2. Browser console
3. API URL
4. CORS permission
5. Local server setup
```

---

## Learning Flow

This project is arranged from basic JavaScript to browser-based JavaScript.

```text
CH01 - CH03: Basic setup, output, variables, data types, operators
CH04 - CH08: Core JavaScript values, functions, arrays, objects, collections
CH09 - CH13: DOM, events, forms, storage, browser data
CH14 - CH15: Timers, promises, async/await, Fetch API
CH16 - CH17: Modules, classes, OOP, errors, regex, advanced functions
```

Recommended learning order:

```text
1. Learn the basic syntax first.
2. Learn functions, arrays, and objects carefully.
3. Learn DOM selection and DOM manipulation.
4. Learn events and forms.
5. Learn storage, asynchronous JavaScript, and Fetch API.
6. Learn modules, classes, and advanced concepts.
```

---

## Chapter Summary

| Chapter | Topic | Main Purpose |
|---|---|---|
| CH01 | Introduction and Script Setup | Learn what JavaScript can do and how to place JavaScript in HTML. |
| CH02 | Output Input and Console | Learn how JavaScript displays output and receives simple user input. |
| CH03 | Variables Data Types and Operators | Learn variables, data types, type checking, type conversion, and operators. |
| CH04 | String Number Math and Date | Learn commonly used built-in objects and methods for text, numbers, math, and dates. |
| CH05 | Control Flow and Loops | Learn decision-making and repeated execution using conditions and loops. |
| CH06 | Functions | Learn how to create reusable blocks of JavaScript code. |
| CH07 | Arrays | Learn how to store, update, search, transform, sort, and destructure lists of data. |
| CH08 | Objects Sets and Maps | Learn object-based data, unique collections, and key-value collections. |
| CH09 | DOM Selection and Content | Learn how to select HTML elements and read or change their content and attributes. |
| CH10 | DOM Style Class and Element Manipulation | Learn how to change style/classes and create, insert, remove, clone, or reuse elements. |
| CH11 | Events | Learn how JavaScript reacts to user actions such as clicks, typing, submitting, and bubbling. |
| CH12 | Forms and Validation | Learn how to read form data and validate user input. |
| CH13 | JSON Storage and Browser Data | Learn JSON, localStorage, sessionStorage, and URL query parameters. |
| CH14 | Timers and Asynchronous JavaScript | Learn delayed code, repeated code, callbacks, promises, and async/await. |
| CH15 | Fetch API and HTTP Request | Learn how JavaScript communicates with APIs using HTTP requests. |
| CH16 | Modules Classes and OOP | Learn JavaScript modules, exports/imports, classes, objects, inheritance, and OOP syntax. |
| CH17 | Error Handling Regular Expression and Advanced Concepts | Learn error handling, strict mode, regex, `this`, call/apply/bind, and higher-order functions. |

---

# Detailed Chapter Guide

## CH01 - Introduction and Script Setup

This chapter introduces JavaScript and different ways to connect JavaScript with HTML.

| File | Main Concepts |
|---|---|
| `01 - What JavaScript Can Do.html` | Basic JavaScript behavior, changing text, changing style, responding to button clicks. |
| `02 - Internal JavaScript.html` | Writing JavaScript inside the `<script>` tag in the same HTML file. |
| `03 - External JavaScript.html` | Connecting an external `.js` file using the `src` attribute. |
| `03 - app.js` | External JavaScript code used by the HTML file. |
| `04 - Script Loading Order.html` | How browser reads HTML and JavaScript from top to bottom. |
| `05 - defer and async.html` | Difference between normal script loading, `defer`, and `async`. |
| `05 - defer-demo.js` | Demonstrates deferred script execution. |
| `05 - async-demo.js` | Demonstrates async script execution. |

Important ideas:

```text
JavaScript can be written internally or externally.
Script position affects when JavaScript can access HTML elements.
defer waits for HTML parsing before running.
async runs as soon as the script finishes loading.
```

---

## CH02 - Output Input and Console

This chapter focuses on basic ways to display information and receive simple user input.

| File | Main Concepts |
|---|---|
| `01 - console.log and Console Methods.html` | `console.log()`, `console.warn()`, `console.error()`, debugging output. |
| `02 - alert confirm and prompt.html` | Browser popup input/output methods. |
| `03 - Display Output in HTML.html` | Showing output using `textContent`, `innerHTML`, and selected elements. |
| `04 - Reading User Input.html` | Reading input field values using the `value` property. |

Important ideas:

```text
console is mainly for developers.
alert, confirm, and prompt are simple browser dialog boxes.
HTML output is better for user-facing result display.
Input values usually come from form controls such as text boxes.
```

---

## CH03 - Variables Data Types and Operators

This chapter introduces the basic building blocks used to store and process data.

| File | Main Concepts |
|---|---|
| `01 - let const and var.html` | Variable declaration, reassignment, modern variable usage. |
| `02 - Variable Naming Rules.html` | Valid names, invalid names, naming conventions. |
| `03 - Primitive Data Types.html` | String, number, boolean, undefined, null, bigint, symbol. |
| `04 - Reference Data Types.html` | Arrays, objects, functions as reference values. |
| `05 - typeof null and undefined.html` | `typeof`, `null`, `undefined`, and common confusion. |
| `06 - Type Conversion and Coercion.html` | Manual conversion and automatic conversion. |
| `07 - Arithmetic and Assignment Operators.html` | `+`, `-`, `*`, `/`, `%`, `**`, `=`, `+=`, `-=`, etc. |
| `08 - Comparison and Logical Operators.html` | `==`, `===`, `!=`, `!==`, `>`, `<`, `&&`, `||`, `!`. |
| `09 - Ternary Nullish and Optional Chaining.html` | `condition ? a : b`, `??`, `?.`. |

Important ideas:

```text
Use const when the variable should not be reassigned.
Use let when the value needs to change.
Avoid var in modern JavaScript unless reading older code.
Use === instead of == for safer comparison.
```

---

## CH04 - String Number Math and Date

This chapter covers common built-in JavaScript tools for text, numbers, math, and dates.

| File | Main Concepts |
|---|---|
| `01 - String Basics.html` | Creating strings, string indexing, escaping characters. |
| `02 - Template Literals.html` | Backtick strings, interpolation, multi-line strings. |
| `03 - String Properties and Methods.html` | `length`, `toUpperCase()`, `toLowerCase()`, `trim()`, `includes()`, `slice()`, `replace()`, `split()`. |
| `04 - Number Basics and Methods.html` | Numeric values, decimal values, `toFixed()`, `toString()`. |
| `05 - parseInt parseFloat and Number.html` | Converting string input into numbers. |
| `06 - Math Object.html` | `Math.round()`, `Math.floor()`, `Math.ceil()`, `Math.random()`, `Math.max()`, `Math.min()`. |
| `07 - Date Object.html` | Creating dates, reading year/month/day/hour/minute values. |
| `08 - Date Formatting.html` | Formatting dates for readable output. |

Important ideas:

```text
String methods return new strings because strings are immutable.
User input usually arrives as a string.
Number(), parseInt(), and parseFloat() convert strings differently.
JavaScript Date months are zero-based when using some Date methods.
```

---

## CH05 - Control Flow and Loops

This chapter teaches how to control which code runs and how many times it runs.

| File | Main Concepts |
|---|---|
| `01 - if else.html` | Conditional logic using `if`, `else if`, and `else`. |
| `02 - switch.html` | Multi-case selection using `switch`, `case`, `break`, and `default`. |
| `03 - for Loop.html` | Counter-based loop. |
| `04 - while and do while.html` | Condition-based loops. |
| `05 - break and continue.html` | Stop a loop or skip one loop round. |
| `06 - for of Loop.html` | Loop through iterable values such as arrays and strings. |
| `07 - for in Loop.html` | Loop through object property keys. |

Important ideas:

```text
Use if else for flexible conditions.
Use switch when comparing one value against many fixed cases.
Use for when the number of rounds is known.
Use while when the loop depends on a condition.
Use for...of for array values.
Use for...in for object keys.
```

---

## CH06 - Functions

This chapter teaches how to package reusable logic into functions.

| File | Main Concepts |
|---|---|
| `01 - Function Declaration.html` | Creating named functions using function declaration syntax. |
| `02 - Function Expression.html` | Storing a function inside a variable. |
| `03 - Arrow Function.html` | Shorter function syntax using `=>`. |
| `04 - Parameters Arguments and Default Values.html` | Passing values into functions and using default parameter values. |
| `05 - Rest Parameters.html` | Accepting many arguments using `...`. |
| `06 - Return Values.html` | Sending a result back from a function. |
| `07 - Callback Function.html` | Passing a function into another function. |
| `08 - IIFE.html` | Immediately Invoked Function Expression. |
| `09 - Closure.html` | Inner function remembering outer function variables. |

Important ideas:

```text
Function declaration is good for normal reusable functions.
Function expression stores a function as a value.
Arrow function is useful for short callbacks.
return gives the result back to the caller.
A callback is a function passed into another function.
A closure allows a function to remember variables from its outer scope.
```

---

## CH07 - Arrays

This chapter focuses on list-style data and common array methods.

| File | Main Concepts |
|---|---|
| `01 - Array Creation and Access.html` | Creating arrays, accessing items by index, reading `length`. |
| `02 - Add Update and Remove Array Items.html` | Direct index update, adding items, deleting items carefully. |
| `03 - push pop shift unshift.html` | Add/remove from the beginning or end of an array. |
| `04 - slice splice concat.html` | Extract, modify, and combine arrays. |
| `05 - indexOf includes find and findIndex.html` | Searching for values or objects inside arrays. |
| `06 - forEach map filter.html` | Looping, transforming, and filtering arrays. |
| `07 - reduce some every.html` | Accumulating values and checking conditions. |
| `08 - sort reverse and toSorted.html` | Sorting and reversing array values. |
| `09 - Array Destructuring and Spread.html` | Extracting values and copying/combining arrays with `...`. |

Important ideas:

```text
Array index starts from 0.
Some methods mutate the original array.
Some methods return a new array.
forEach is for running an action.
map is for transforming values.
filter is for keeping selected values.
reduce is for producing one final result.
```

---

## CH08 - Objects Sets and Maps

This chapter teaches key-value data structures.

| File | Main Concepts |
|---|---|
| `01 - Object Literal.html` | Creating objects using `{}`. |
| `02 - Object Properties and Methods.html` | Accessing properties and calling object methods. |
| `03 - this Keyword in Object.html` | Using `this` to refer to the current object. |
| `04 - Object Destructuring and Spread.html` | Extracting and copying object properties. |
| `05 - Object.keys values and entries.html` | Converting object keys, values, and entries into arrays. |
| `06 - Object Copying.html` | Shallow copy and reference behavior. |
| `07 - Set.html` | Storing unique values. |
| `08 - Map.html` | Storing key-value pairs with flexible key types. |

Important ideas:

```text
Objects group related data using property names.
Arrays are best for ordered lists.
Objects are best for named properties.
Set is useful when duplicate values should be removed.
Map is useful when key-value data needs stronger collection behavior than normal objects.
```

---

## CH09 - DOM Selection and Content

This chapter starts browser DOM programming.

| File | Main Concepts |
|---|---|
| `01 - getElementById.html` | Selecting one element by ID. |
| `02 - getElementsByClassName and TagName.html` | Selecting multiple elements by class name or tag name. |
| `03 - querySelector and querySelectorAll.html` | Selecting elements using CSS selector syntax. |
| `04 - NodeList vs HTMLCollection.html` | Difference between DOM collection types. |
| `05 - textContent innerText and innerHTML.html` | Reading and changing element content. |
| `06 - value Property.html` | Reading and changing form input values. |
| `07 - getAttribute setAttribute and dataset.html` | Working with HTML attributes and custom data attributes. |

Important ideas:

```text
getElementById returns one element.
querySelector returns the first matching element.
querySelectorAll returns a NodeList.
getElementsByClassName returns an HTMLCollection.
textContent is safer for plain text.
innerHTML can insert HTML but must be used carefully.
```

---

## CH10 - DOM Style Class and Element Manipulation

This chapter teaches how JavaScript changes the page structure and appearance.

| File | Main Concepts |
|---|---|
| `01 - style Property.html` | Changing inline CSS using JavaScript. |
| `02 - className and classList.html` | Adding, removing, toggling, and checking CSS classes. |
| `03 - createElement.html` | Creating new HTML elements using JavaScript. |
| `04 - append prepend before and after.html` | Inserting elements into different positions. |
| `05 - remove and replaceWith.html` | Removing or replacing existing elements. |
| `06 - cloneNode.html` | Copying existing elements. |
| `07 - template Element.html` | Reusing hidden HTML templates. |

Important ideas:

```text
Use style for quick inline changes.
Use classList for cleaner style changes.
createElement creates a new element but does not display it until inserted.
append and prepend insert inside an element.
before and after insert beside an element.
```

---

## CH11 - Events

This chapter teaches how JavaScript responds to user actions.

| File | Main Concepts |
|---|---|
| `01 - Inline Event Attribute.html` | Using HTML event attributes such as `onclick`. |
| `02 - onclick Property.html` | Assigning an event handler using a DOM property. |
| `03 - addEventListener.html` | Adding event listeners using the recommended modern method. |
| `04 - Event Object.html` | Reading event details from the event object. |
| `05 - Mouse Events.html` | Click, double click, mouse enter, mouse leave, mouse move. |
| `06 - Keyboard Events.html` | Keydown, keyup, key value, and keyboard interaction. |
| `07 - Input Change and Submit Events.html` | Form-related events. |
| `08 - preventDefault.html` | Stopping default browser behavior. |
| `09 - Event Bubbling Capturing and Delegation.html` | Event flow and handling many child elements through one parent. |

Important ideas:

```text
Inline events are simple but not ideal for larger projects.
addEventListener is the recommended event method.
The event object contains information about what happened.
preventDefault stops default browser action.
Event delegation is useful for dynamic lists.
```

---

## CH12 - Forms and Validation

This chapter teaches how to read and validate form data.

| File | Main Concepts |
|---|---|
| `01 - Reading Form Values.html` | Reading values from form inputs. |
| `02 - FormData.html` | Collecting form values using the FormData object. |
| `03 - Text Email Number and Password Inputs.html` | Handling common input types. |
| `04 - Checkbox Radio and Select.html` | Reading multiple-choice form controls. |
| `05 - Required Pattern Min Max and Length.html` | Built-in HTML validation attributes. |
| `06 - Constraint Validation API.html` | JavaScript validation methods and properties. |
| `07 - Custom Error Message.html` | Showing custom validation messages. |

Important ideas:

```text
Form input values are usually strings.
Checkboxes can support multiple selected values.
Radio buttons usually represent one selected value from a group.
FormData is useful for collecting form values automatically.
HTML validation can be combined with JavaScript validation.
```

---

## CH13 - JSON Storage and Browser Data

This chapter teaches browser-side data storage and data conversion.

| File | Main Concepts |
|---|---|
| `01 - JSON stringify and parse.html` | Converting objects/arrays to JSON strings and back. |
| `02 - localStorage.html` | Storing data that remains after the browser is closed. |
| `03 - sessionStorage.html` | Storing data for the current tab/session. |
| `04 - Store Array and Object.html` | Saving arrays and objects using JSON. |
| `05 - Remove and Clear Storage.html` | Removing one item or clearing all stored data. |
| `06 - URLSearchParams.html` | Reading query string values from the URL. |

Important ideas:

```text
localStorage and sessionStorage store string data only.
Use JSON.stringify() before storing arrays or objects.
Use JSON.parse() after reading arrays or objects back.
localStorage is separated by website origin.
URLSearchParams helps read values after ? in the URL.
```

---

## CH14 - Timers and Asynchronous JavaScript

This chapter introduces delayed execution and asynchronous programming.

| File | Main Concepts |
|---|---|
| `01 - setTimeout.html` | Run code once after a delay. |
| `02 - setInterval.html` | Run code repeatedly after an interval. |
| `03 - clearTimeout and clearInterval.html` | Stop scheduled timer code. |
| `04 - Callback.html` | Use a function after another task finishes. |
| `05 - Promise.html` | Represent a future success or failure. |
| `06 - then catch and finally.html` | Handle promise result, error, and completion. |
| `07 - async and await.html` | Write asynchronous code in a cleaner style. |
| `08 - Promise all race any and allSettled.html` | Run and combine multiple promises. |

Important ideas:

```text
setTimeout runs once.
setInterval runs repeatedly.
Promise can be pending, fulfilled, or rejected.
async functions always return a promise.
await pauses inside an async function until a promise settles.
```

---

## CH15 - Fetch API and HTTP Request

This chapter teaches API communication from the browser.

| File | Main Concepts |
|---|---|
| `01 - Fetch GET Request.html` | Basic GET request using `fetch()`. |
| `02 - Fetch JSON Data.html` | Reading JSON response data using `response.json()`. |
| `03 - Fetch POST Request.html` | Sending data using POST request. |
| `04 - Headers.html` | Sending request headers such as `Content-Type`. |
| `05 - Loading and Error State.html` | Showing loading messages and handling request failure. |
| `06 - AbortController.html` | Canceling a fetch request. |

Important ideas:

```text
fetch() sends an HTTP request and returns a Promise.
response.json() reads the response body and parses it as JSON.
POST is commonly used to send data to a server.
Headers provide extra information about the request.
AbortController can cancel a request that is no longer needed.
```

---

## CH16 - Modules Classes and OOP

This chapter combines modern JavaScript file organization and object-oriented syntax.

| File | Main Concepts |
|---|---|
| `01 - Module Script.html` | Using `<script type="module">`. |
| `01 - main.js` | Main module file. |
| `01 - math.js` | Exporting reusable logic from another file. |
| `02 - Named Export and Import.html` | Named exports and imports. |
| `02 - main.js` | Main file for named import example. |
| `02 - helper.js` | Helper file for named export example. |
| `03 - Default Export.html` | Default export and import. |
| `03 - main.js` | Main file for default import example. |
| `03 - user.js` | Default exported value/class/function example. |
| `04 - Class and Object.html` | Creating classes and objects. |
| `05 - Constructor and Methods.html` | Initializing object data and creating methods. |
| `06 - Static Method and Property.html` | Class-level methods and properties. |
| `07 - Getter Setter and Private Field.html` | Controlled access and private data. |
| `08 - Inheritance and Overriding.html` | Extending classes and replacing parent methods. |

Important ideas:

```text
Modules help split JavaScript into separate files.
export shares code from one file.
import receives code from another file.
Classes provide a cleaner syntax for creating object blueprints.
extends creates inheritance.
super calls the parent class constructor or method.
```

---

## CH17 - Error Handling Regular Expression and Advanced Concepts

This chapter teaches important advanced JavaScript concepts used in real projects.

| File | Main Concepts |
|---|---|
| `01 - try catch finally.html` | Handling runtime errors safely. |
| `02 - throw and Error Object.html` | Creating and throwing errors manually. |
| `03 - Custom Error.html` | Creating custom error types. |
| `04 - Strict Mode.html` | Safer JavaScript mode that prevents some bad practices. |
| `05 - Regular Expression Basics.html` | Basic regex pattern matching. |
| `06 - test exec match replace and split.html` | Common regex-related methods. |
| `07 - this in Different Situations.html` | Understanding how `this` changes depending on usage. |
| `08 - call apply and bind.html` | Manually controlling the value of `this`. |
| `09 - Higher Order Function.html` | Functions that receive or return other functions. |

Important ideas:

```text
try catch prevents the whole program from crashing.
throw creates an error intentionally.
Regular expressions are useful for pattern checking and text processing.
this depends on how a function is called.
call, apply, and bind can control this manually.
Higher-order functions are common in modern JavaScript.
```

---

## Main JavaScript Concepts Covered

| Category | Covered Concepts |
|---|---|
| Script setup | Internal JS, external JS, script order, defer, async. |
| Output/input | console, alert, confirm, prompt, HTML output, input value. |
| Variables | let, const, var, naming, scope introduction. |
| Data types | string, number, boolean, null, undefined, bigint, symbol, object, array, function. |
| Operators | Arithmetic, assignment, comparison, logical, ternary, nullish coalescing, optional chaining. |
| Strings | Template literals, length, search, replace, split, trim, case conversion. |
| Numbers | Number conversion, number methods, Math object, random numbers. |
| Date | Date creation, date parts, simple formatting. |
| Control flow | if else, switch, for, while, do while, break, continue. |
| Functions | Declaration, expression, arrow function, parameter, return, callback, IIFE, closure. |
| Arrays | Creation, access, mutation, search, map, filter, reduce, sort, destructuring, spread. |
| Objects | Properties, methods, this, destructuring, spread, copying, keys, values, entries. |
| Collections | Set, Map. |
| DOM | Selection, content, attributes, dataset, style, class, create/insert/remove elements. |
| Events | click, mouse, keyboard, input, change, submit, preventDefault, bubbling, capturing, delegation. |
| Forms | Input reading, FormData, checkbox, radio, select, validation attributes, Constraint Validation API. |
| Storage | JSON, localStorage, sessionStorage, remove, clear, URLSearchParams. |
| Async | setTimeout, setInterval, Promise, then, catch, finally, async, await. |
| API | fetch, GET, POST, headers, JSON response, loading state, error state, AbortController. |
| Modules | type module, named export/import, default export/import, module scope. |
| OOP | class, object, constructor, method, static, getter, setter, private field, inheritance. |
| Advanced | Error handling, strict mode, regex, this, call, apply, bind, higher-order function. |

---

## Recommended Study Method

For each file:

```text
1. Open the HTML file in the browser.
2. Read the comments at the top of the file.
3. Run the demo using the buttons or inputs.
4. Open Developer Tools and check the Console tab.
5. Modify one part of the JavaScript code.
6. Refresh the browser and observe the difference.
7. Write your own small example after understanding the original one.
```

Do not only read the code. JavaScript is best learned by changing values, testing conditions, causing errors, and fixing them.

---

## Suggested Practice After Finishing

After completing CH01 to CH17, try building small browser projects using the same concepts.

Recommended practice projects:

```text
1. Counter app
2. Todo list
3. Form validator
4. Simple calculator
5. Search/filter list
6. Local storage notes app
7. Fetch API user card viewer
8. Quiz app
9. Expense tracker
10. Weather viewer using API
```

These projects are not included as CH18 in this version, but they are good practice after finishing the core chapters.

---

## Notes About Browser Compatibility

Most examples use modern JavaScript syntax, such as:

```text
let
const
arrow functions
template literals
optional chaining
nullish coalescing
class syntax
private fields
modules
async/await
fetch
```

Use a modern browser such as:

```text
Google Chrome
Microsoft Edge
Mozilla Firefox
Safari
```

For the best experience, open the browser Developer Tools while testing the examples.

---

## Final Learning Goal

After finishing this JavaScript note, you should be able to:

```text
Write basic and intermediate JavaScript syntax.
Manipulate HTML and CSS through the DOM.
Handle user events.
Read and validate form data.
Store browser-side data.
Use asynchronous JavaScript.
Request API data using Fetch.
Organize code using modules.
Create classes and objects.
Handle errors and use regular expressions.
Understand important advanced concepts such as this, closure, and higher-order functions.
```

This project is designed to be a practical executable reference. It can be used for revision, classroom learning, self-study, or as a base for future JavaScript practice projects.
