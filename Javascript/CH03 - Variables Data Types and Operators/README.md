# CH03 - Variables Data Types and Operators

This chapter introduces the basic building blocks of JavaScript values and expressions.
The goal is not only to memorize syntax, but also to run each example and observe what JavaScript actually returns.

## Learning Order

| File | Topic | Main Purpose |
|---|---|---|
| `01 - let const and var.html` | Variable declaration | Shows how to create variables using `let`, `const`, and `var`. |
| `02 - Variable Naming Rules.html` | Naming rules | Explains valid names, invalid names, case sensitivity, and common naming style. |
| `03 - Primitive Data Types.html` | Primitive values | Demonstrates `string`, `number`, `boolean`, `undefined`, `null`, `bigint`, and `symbol`. |
| `04 - Reference Data Types.html` | Reference values | Demonstrates object, array, function, reference copying, and `const` with arrays. |
| `05 - typeof null and undefined.html` | Type checking | Shows how `typeof` works and explains the difference between `null` and `undefined`. |
| `06 - Type Conversion and Coercion.html` | Type changing | Compares explicit conversion with automatic coercion. |
| `07 - Arithmetic and Assignment Operators.html` | Calculation and updates | Demonstrates arithmetic, assignment, increment, and decrement operators. |
| `08 - Comparison and Logical Operators.html` | Conditions | Demonstrates comparison operators, logical operators, and `==` vs `===`. |
| `09 - Ternary Nullish and Optional Chaining.html` | Modern expression operators | Demonstrates `? :`, `??`, and `?.`. |

## Important Notes

- Use `const` by default when a variable does not need reassignment.
- Use `let` when the value needs to change later.
- Avoid `var` in new code because it has older scope behavior.
- Prefer `===` and `!==` over `==` and `!=` because strict comparison checks both value and type.
- Use `Number()`, `String()`, and `Boolean()` when you want intentional type conversion.
- Use `??` when you only want a fallback for `null` or `undefined`.
- Use `?.` when a nested property may not exist.

## How to Run

Open any `.html` file in a browser and click the buttons in the demo area.
Each file is independent and can be studied without a server.
