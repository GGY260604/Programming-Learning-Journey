/**
 * ============================================================
 * 02 - Using process.env.js
 * ============================================================
 *
 * Goal:
 * - Understand process.env
 * - Learn how Node reads environment variables
 * - Pass environment variables from terminal
 *
 * Run:
 *
 * Windows PowerShell:
 * $env:PORT=5000; node "02 - Using process.env.js"
 *
 * Linux / Mac:
 * PORT=5000 node "02 - Using process.env.js"
 *
 * ============================================================
 */

console.log("===== Environment Variables in Node =====");

/**
 * process.env contains all environment variables
 */

console.log(process.env);


/**
 * Access a specific variable
 */

console.log("\n===== Accessing Specific Variables =====");

const port = process.env.PORT;

console.log("PORT:", port);


/**
 * Example configuration usage
 */

const SERVER_PORT = process.env.PORT || 3000;

console.log("Server will run on port:", SERVER_PORT);


/**
 * ============================================================
 * Common Backend Variables
 * ============================================================
 *
 * PORT
 * DATABASE_URL
 * API_KEY
 * JWT_SECRET
 *
 */

console.log("\nExample variables:");

console.log("Database URL:", process.env.DATABASE_URL);
console.log("JWT Secret:", process.env.JWT_SECRET);


/**
 * ============================================================
 * Why process.env returns strings
 * ============================================================
 *
 * All environment variables are strings.
 */

console.log("\n===== Type Check =====");

process.env.TEST_NUMBER = "123";

console.log(typeof process.env.TEST_NUMBER);


/**
 * If needed, convert types
 */

const number = Number(process.env.TEST_NUMBER);

console.log("Converted number:", number);


/**
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ process.env stores environment variables
 * ✔ Values are always strings
 * ✔ Use || to define default values
 *
 * ============================================================
 */