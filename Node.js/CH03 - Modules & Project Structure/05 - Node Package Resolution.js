/**
 * ============================================================
 * 05 - Node Package Resolution.js
 * ============================================================
 *
 * Goal:
 * - Understand how Node finds modules
 * - Understand relative vs absolute import
 * - Understand node_modules
 * - Fix "Cannot find module" errors
 *
 * Run:
 * node "05 - Node Package Resolution.js"
 *
 * ============================================================
 */


/**
 * ============================================================
 * 1️⃣ RELATIVE IMPORT
 * ============================================================
 *
 * Starts with:
 * ./   (current folder)
 * ../  (parent folder)
 *
 * Example:
 * require("./math.js");
 */

console.log("Relative import example explained in comments.");


/**
 * If you forget "./"
 *
 * ❌ require("math.js")
 *
 * Node will search in:
 * node_modules/
 * NOT in your local folder
 */


/**
 * ============================================================
 * 2️⃣ BUILT-IN MODULE
 * ============================================================
 */

const path = require("path"); // built-in module

console.log("Built-in module loaded:", typeof path);


/**
 * Node checks:
 * 1. Is it a core module? (path, fs, os)
 * 2. If not → search node_modules
 */


/**
 * ============================================================
 * 3️⃣ THIRD-PARTY MODULE
 * ============================================================
 *
 * Example:
 * npm install lodash
 *
 * Then:
 * require("lodash");
 *
 * Node searches:
 * node_modules/lodash
 */

console.log("Third-party module explanation in comments.");


/**
 * ============================================================
 * 4️⃣ HOW NODE SEARCHES MODULES
 * ============================================================
 *
 * When you write:
 * require("express")
 *
 * Node looks:
 *
 * 1. Is it built-in?
 * 2. Look in current folder node_modules/
 * 3. If not found → go up one folder
 * 4. Keep going up until root
 *
 * This is why node_modules at project root works everywhere.
 */


/**
 * ============================================================
 * 5️⃣ COMMON ERROR: Cannot find module
 * ============================================================
 *
 * Causes:
 * - Forgot to run npm install
 * - Wrong relative path
 * - Missing "./"
 * - Wrong file extension in ESM
 *
 * Example mistake:
 *
 * import { add } from "./math"
 *
 * In ESM, you must write:
 *
 * import { add } from "./math.js"
 */


/**
 * ============================================================
 * 6️⃣ BACKEND STRUCTURE EXAMPLE
 * ============================================================
 *
 * project/
 *   ├── node_modules/
 *   ├── package.json
 *   ├── src/
 *   │     ├── routes/
 *   │     ├── controllers/
 *   │     ├── services/
 *
 * If routes import services:
 *
 * require("../services/userService")
 *
 * Always count folder levels carefully.
 */


/**
 * ============================================================
 * VERY IMPORTANT CONCEPT
 * ============================================================
 *
 * Every file in Node is wrapped like this internally:
 *
 * (function(exports, require, module, __filename, __dirname) {
 *     // your code
 * });
 *
 * That is why:
 * - require exists
 * - module.exports exists
 *
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ "./" means local file
 * ✔ No "./" means node_modules
 * ✔ Node searches upward for node_modules
 * ✔ ESM requires file extension
 * ✔ Most "Cannot find module" errors are path mistakes
 *
 * ============================================================
 */