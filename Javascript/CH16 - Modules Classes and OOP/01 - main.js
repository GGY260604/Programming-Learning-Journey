/*
  FILE: 01 - main.js

  This is the main module file for:
  01 - Module Script.html

  import means:
  - Get exported values from another JavaScript module file.
*/

import { add, multiply } from "./01 - math.js";

const output = document.getElementById("output");

const resultOne = add(10, 5);
const resultTwo = multiply(10, 5);

output.textContent =
  "Module script is working. " +
  "Imported add(10, 5): " + resultOne + " ." +
  "Imported multiply(10, 5): " + resultTwo + " ." +
  "The HTML file did not define add() or multiply()." +
  "Those functions came from 01 - math.js.";
