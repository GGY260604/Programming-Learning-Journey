/*
  FILE: 02 - main.js

  Named imports use curly braces.

  The names inside the curly braces must match the exported names from
  02 - helper.js.
*/

import {
  courseName,
  formatCurrency,
  calculateTotal
} from "./02 - helper.js";

const output = document.getElementById("output");

const price = 12.5;
const quantity = 3;
const total = calculateTotal(price, quantity);

output.textContent =
  "Course: " + courseName + ". " +
  "Price: " + formatCurrency(price) + ". " +
  "Quantity: " + quantity + ". " +
  "Total: " + formatCurrency(total) + ". " +
  "courseName, formatCurrency(), and calculateTotal() were imported by name.";
