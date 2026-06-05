/*
  FILE: 02 - helper.js

  This file demonstrates named exports.

  There are two common ways to write named export:
  1. export const value = ...
  2. export function name() { ... }
*/

export const courseName = "JavaScript Programming Note";

export function formatCurrency(amount) {
  return "RM " + amount.toFixed(2);
}

export function calculateTotal(price, quantity) {
  return price * quantity;
}
