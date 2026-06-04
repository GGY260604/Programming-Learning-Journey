/*
  FILE: 03 - app.js
  TOPIC: CH01 - Introduction and Script Setup

  This is an external JavaScript file.
  It is connected to:
  03 - External JavaScript.html
*/

/*
  Select the HTML elements that this script needs.
*/
const description = document.getElementById("description");
const output = document.getElementById("output");

const changeTextBtn = document.getElementById("changeTextBtn");
const changeClassBtn = document.getElementById("changeClassBtn");
const resetBtn = document.getElementById("resetBtn");

/*
  addEventListener() connects an event to a function.

  "click" means the function will run when the user clicks the button.
  This is usually cleaner than writing onclick directly inside HTML.
*/
changeTextBtn.addEventListener("click", function () {
  description.textContent = "This text was changed by an external JavaScript file.";
  output.textContent = "The file 03 - app.js handled the button click.";
});

changeClassBtn.addEventListener("click", function () {
  description.classList.toggle("success-text");
  output.textContent = "The external script toggled the success-text class.";
});

resetBtn.addEventListener("click", function () {
  description.textContent = "Click the button to run JavaScript from the external file.";
  description.className = "";
  output.textContent = "Demo has been reset by the external JavaScript file.";
});
