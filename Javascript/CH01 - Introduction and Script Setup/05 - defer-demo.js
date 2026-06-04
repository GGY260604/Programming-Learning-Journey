/*
  FILE: 05 - defer-demo.js
  TOPIC: CH01 - Introduction and Script Setup

  This file is loaded using the defer attribute.

  Because it is deferred:
  - The browser can download it while parsing HTML.
  - The script runs after the HTML document has been parsed.
  - It is safe to select normal page elements here.
*/

const deferOutput = document.getElementById("output");

if (deferOutput !== null) {
  deferOutput.textContent += "Defer script has run after HTML parsing.\n";
}

console.log("Defer script has run after HTML parsing.");
