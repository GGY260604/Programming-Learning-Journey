/*
  FILE: 05 - async-demo.js
  TOPIC: CH01 - Introduction and Script Setup

  This file is loaded using the async attribute.

  Because it is async:
  - The browser can download it while parsing HTML.
  - The script runs as soon as it finishes downloading.
  - It may run before or after some HTML elements are available.

  For that reason, async scripts should usually be independent.
*/

function writeAsyncMessage() {
  const asyncOutput = document.getElementById("output");

  if (asyncOutput !== null) {
    asyncOutput.textContent += "Async script has run. Its exact timing is less predictable.\n";
  }
}

/*
  If #output already exists, write immediately.
  If it does not exist yet, wait until DOMContentLoaded.

  This defensive pattern prevents an error when an async script runs too early.
*/
if (document.getElementById("output") !== null) {
  writeAsyncMessage();
} else {
  document.addEventListener("DOMContentLoaded", writeAsyncMessage);
}

console.log("Async script has run. Exact timing can vary.");
