/*
  FILE: 04 - script.js
  This file contains all JavaScript logic.
  HTML stays clean and readable.
*/

// Select elements
const text = document.getElementById("text");
const btn = document.getElementById("btn");

// Add event listener
btn.addEventListener("click", function() {

  text.textContent = "Text Changed Using External JavaScript!";

  document.body.style.backgroundColor = "lightyellow";

  console.log("Button was clicked.");

});