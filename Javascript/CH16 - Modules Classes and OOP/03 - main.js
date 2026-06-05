/*
  FILE: 03 - main.js

  Default import does not use curly braces.

  The function was exported as default, so this file can import it using
  any valid variable name.
*/

import makeCard from "./03 - user.js";

const output = document.getElementById("output");

const user = {
  name: "Galen",
  role: "Student",
  level: "Beginner"
};

output.textContent =
  makeCard(user) +
  ". The imported function was named makeCard in this file.";
