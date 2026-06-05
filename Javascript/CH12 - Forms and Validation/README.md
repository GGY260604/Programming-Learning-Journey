# CH12 - Forms and Validation

This chapter teaches how JavaScript works with HTML forms.

The main goal is to understand how to read form values, handle different form controls, and validate user input before using or submitting the data.

## Files

| File | Main Focus |
|---|---|
| `01 - Reading Form Values.html` | Reading input, textarea, and select values using `.value` |
| `02 - FormData.html` | Collecting form data using `new FormData(form)`, `get()`, `getAll()`, and `entries()` |
| `03 - Text Email Number and Password Inputs.html` | Working with common input types and properties like `.value` and `.valueAsNumber` |
| `04 - Checkbox Radio and Select.html` | Handling `.checked`, radio groups, single select, multiple select, `selectedIndex`, and `selectedOptions` |
| `05 - Required Pattern Min Max and Length.html` | Using built-in HTML validation attributes such as `required`, `pattern`, `min`, `max`, `step`, `minlength`, and `maxlength` |
| `06 - Constraint Validation API.html` | Checking validation with `checkValidity()`, `reportValidity()`, `validity`, and `validationMessage` |
| `07 - Custom Error Message.html` | Creating custom validation rules using `setCustomValidity()` |

## Important properties and methods in this chapter

| Syntax | Use |
|---|---|
| `input.value` | Reads or changes the current value of an input |
| `textarea.value` | Reads or changes the current textarea content |
| `select.value` | Reads the selected option value |
| `checkbox.checked` | Returns `true` or `false` depending on whether the checkbox is selected |
| `radio.checked` | Returns `true` or `false` for one radio button |
| `select.selectedIndex` | Returns the index number of the selected option |
| `select.selectedOptions` | Returns selected options, useful for multiple select |
| `input.valueAsNumber` | Reads a number input value as a number |
| `new FormData(form)` | Collects named form controls from a form |
| `formData.get(name)` | Gets one value from FormData |
| `formData.getAll(name)` | Gets multiple values with the same name |
| `formData.entries()` | Loops through all FormData name-value pairs |
| `event.preventDefault()` | Stops the form from refreshing or submitting normally |
| `checkValidity()` | Returns whether a form or control is valid |
| `reportValidity()` | Shows the browser validation message |
| `validity` | Contains detailed validation state information |
| `validationMessage` | Gets the current validation message |
| `setCustomValidity(message)` | Sets a custom error message |
| `setCustomValidity("")` | Clears a custom error message |

## Important validation attributes

| Attribute | Use |
|---|---|
| `required` | Field must not be empty |
| `pattern` | Value must match a regular expression pattern |
| `title` | Gives extra pattern guidance to the user |
| `min` | Minimum value for number, date, range, and similar inputs |
| `max` | Maximum value for number, date, range, and similar inputs |
| `step` | Allowed step interval for number-like values |
| `minlength` | Minimum text length |
| `maxlength` | Maximum text length |
| `novalidate` | Disables automatic form validation, useful when demonstrating validation manually |

## Learning order

Study the files in order.

Start with manually reading form values, then learn `FormData`, then learn special form controls, then move to validation attributes and validation APIs.
