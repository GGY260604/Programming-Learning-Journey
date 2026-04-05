/**
 * ============================================================
 * 01 - global __dirname __filename.js
 * ============================================================
 *
 * Goal:
 * - Understand Node global variables
 * - Understand __dirname
 * - Understand __filename
 * - Understand global object
 *
 * These do NOT exist in browser JavaScript.
 *
 * Run:
 * node "01 - global __dirname __filename.js"
 * ============================================================
 */


console.log("===== 1️⃣ __filename =====");
console.log(__filename);

/**
 * __filename:
 * - Absolute path of current file
 * - Very useful for debugging
 */


console.log("\n===== 2️⃣ __dirname =====");
console.log(__dirname);

/**
 * __dirname:
 * - Absolute path of current folder
 * - VERY IMPORTANT in backend
 *
 * Used when:
 * - Reading files
 * - Serving static files
 * - Configuring paths
 */


console.log("\n===== 3️⃣ global object =====");

/**
 * In browser:
 * global object = window
 *
 * In Node:
 * global object = global
 */

global.customMessage = "Hello from global object";

console.log(global.customMessage);


/**
 * But in modern Node:
 * We usually avoid polluting global.
 */


console.log("\n===== 4️⃣ process object =====");

console.log("Node version:", process.version);
console.log("Platform:", process.platform);


/**
 * process is extremely important:
 * - process.env
 * - process.argv
 * - process.exit()
 *
 * We'll learn more in next file.
 */


console.log("\n===== 5️⃣ WHY __dirname MATTERS (Backend Example) =====");

/**
 * Imagine reading a file:
 *
 * WRONG WAY:
 * fs.readFile("data.txt")
 *
 * This may fail if run from another directory.
 *
 * CORRECT WAY:
 */

const path = require("path");

const filePath = path.join(__dirname, "data.txt");

console.log("Safe file path:", filePath);


/**
 * This ensures:
 * - Always correct path
 * - Works regardless of where command is run
 *
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ __filename = current file path
 * ✔ __dirname = current folder path
 * ✔ global = Node global object
 * ✔ process = runtime info
 *
 * These are backend-only features.
 * ============================================================
 */