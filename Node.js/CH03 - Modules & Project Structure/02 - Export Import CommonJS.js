/**
 * ============================================================
 * 02 - Export Import CommonJS.js
 * ============================================================
 *
 * Goal:
 * - Understand require()
 * - Understand module.exports
 * - Learn how Node modules work
 *
 * Run:
 * node "02 - Export Import CommonJS.js"
 *
 * ============================================================
 */


/**
 * Import the math module
 */

const math = require("./01 - math.js");

console.log("===== Using Imported Module =====");

console.log("Add:", math.add(10, 5));
console.log("Subtract:", math.subtract(10, 5));


/**
 * ============================================================
 * HOW THIS WORKS
 * ============================================================
 *
 * 1. Node wraps each file inside a function.
 * 2. Each file has its own scope.
 * 3. module.exports defines what is exported.
 * 4. require() imports it.
 *
 * This prevents global pollution.
 */


/**
 * ============================================================
 * BACKEND STYLE EXAMPLE
 * ============================================================
 */

console.log("\n===== Backend Simulation =====");

/**
 * In real backend:
 *
 * const userService = require("./services/userService");
 * const authController = require("./controllers/authController");
 *
 * Modules separate responsibilities.
 */


/**
 * ============================================================
 * IMPORTANT CONCEPT
 * ============================================================
 *
 * Node uses CommonJS by default.
 *
 * require() → import
 * module.exports → export
 *
 * Later we will also learn:
 * import / export (ES Modules)
 *
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ Every file is a module
 * ✔ Use module.exports to export
 * ✔ Use require() to import
 * ✔ This is how backend code is structured
 *
 * ============================================================
 */