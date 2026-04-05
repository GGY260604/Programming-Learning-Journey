/**
 * ============================================================
 * 04 - Export Import ESM.js
 * ============================================================
 *
 * Goal:
 * - Understand ES Module (ESM)
 * - Learn import / export syntax
 * - Understand difference from CommonJS
 *
 * IMPORTANT:
 * Make sure package.json has:
 * "type": "module"
 *
 * Run:
 * node "04 - Export Import ESM.js"
 * ============================================================
 */

import { add, subtract } from "./03 - math-esm.js";

console.log("===== Using ESM Import =====");

console.log("Add:", add(20, 5));
console.log("Subtract:", subtract(20, 5));


/**
 * ============================================================
 * DEFAULT EXPORT EXAMPLE
 * ============================================================
 */

// If math-esm.js had:
// export default function multiply() {...}
//
// Then import like:
//
// import multiply from "./math-esm.js";


/**
 * ============================================================
 * CommonJS vs ESM
 * ============================================================
 *
 * CommonJS:
 *   const math = require("./math.js");
 *   module.exports = {}
 *
 * ESM:
 *   import { add } from "./math.js";
 *   export function add() {}
 *
 * ============================================================
 * IMPORTANT DIFFERENCES
 * ============================================================
 *
 * 1. ESM is static (analyzed before execution)
 * 2. require() is dynamic
 * 3. ESM is standard JavaScript
 * 4. TypeScript uses ESM style
 *
 * ============================================================
 * BACKEND REALITY
 * ============================================================
 *
 * Old Node projects → CommonJS
 * Modern Node projects → ESM
 * TypeScript backend → ESM
 *
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ ESM uses import / export
 * ✔ Must set "type": "module"
 * ✔ Used in modern backend
 * ✔ Required for TypeScript workflow
 *
 * ============================================================
 */