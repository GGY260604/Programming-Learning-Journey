/**
 * ============================================================
 * 01 - Let Const Var Differences.js
 * ============================================================
 *
 * Goal:
 * Understand the difference between:
 * - var
 * - let
 * - const
 *
 * This is IMPORTANT for backend development because:
 * - Scope mistakes cause bugs
 * - Reassignment issues break logic
 * - Async code + wrong variable declaration = disaster
 *
 * Run this file using:
 * node "01 - Let Const Var Differences.js"
 *
 * ============================================================
 */


console.log("===== VAR EXAMPLE =====");

var a = 10;
var a = 20; // ❗ var allows re-declaration
console.log("var a:", a);


/**
 * Problem with var:
 * - Function scoped
 * - Can be re-declared
 * - Causes unexpected bugs
 */

console.log("\n===== LET EXAMPLE =====");

let b = 30;
// let b = 40; ❌ This would cause error (cannot redeclare)

b = 40; // ✅ Reassignment allowed
console.log("let b:", b);


/**
 * let:
 * - Block scoped
 * - Cannot re-declare
 * - Can reassign
 */

console.log("\n===== CONST EXAMPLE =====");

const c = 50;
// c = 60; ❌ Cannot reassign
console.log("const c:", c);


/**
 * const:
 * - Block scoped
 * - Cannot re-declare
 * - Cannot reassign
 * - Must be initialized immediately
 */


console.log("\n===== BLOCK SCOPE TEST =====");

if (true) {
    var x = 100;
    let y = 200;
    const z = 300;
}

console.log("var x outside block:", x); // ✅ Works
// console.log(y); ❌ Error (block scoped)
// console.log(z); ❌ Error (block scoped)


/**
 * IMPORTANT:
 *
 * var = function scoped
 * let & const = block scoped
 *
 * Backend rule:
 * ✔ Always use const by default
 * ✔ Use let if you must reassign
 * ❌ Avoid var
 */


console.log("\n===== CONST WITH OBJECT =====");

const user = {
    name: "Alice"
};

// user = {} ❌ Cannot reassign object
user.name = "Bob"; // ✅ But object property can change

console.log(user);

/**
 * const protects the variable reference,
 * NOT the internal content.
 */


/**
 * ============================
 * MINI BACKEND SCENARIO
 * ============================
 */

console.log("\n===== BACKEND STYLE EXAMPLE =====");

const PORT = 3000; // server port should NEVER change
let requestCount = 0; // this changes

function handleRequest() {
    requestCount++;
    console.log(`Server running on port ${PORT}`);
    console.log(`Total requests: ${requestCount}`);
}

handleRequest();
handleRequest();


/**
 * ============================
 * KEY TAKEAWAYS
 * ============================
 *
 * 1. Never use var in modern Node.js
 * 2. Use const by default
 * 3. Use let only when needed
 * 4. Understand block scope
 *
 * In real backend code:
 * - Environment variables → const
 * - Config values → const
 * - Changing counters → let
 *
 * ============================
 */