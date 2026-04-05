/**
 * ============================================================
 * 01 - Why Environment Variables.js
 * ============================================================
 *
 * Goal:
 * - Understand why environment variables exist
 * - Learn what problems they solve
 *
 * Run:
 * node "01 - Why Environment Variables.js"
 *
 * ============================================================
 */

console.log("===== Why Environment Variables Matter =====");

/**
 * Imagine you are building a backend server.
 *
 * It needs configuration like:
 *
 * - Database URL
 * - API Keys
 * - Secret tokens
 * - Server port
 */


/**
 * ❌ BAD PRACTICE
 */

const DATABASE_PASSWORD = "mySuperSecretPassword";

console.log("Database password:", DATABASE_PASSWORD);

/**
 * Problem:
 *
 * If you push your code to GitHub,
 * the password becomes PUBLIC.
 */


/**
 * Another example
 */

const API_KEY = "123456-SECRET-KEY";

console.log("API Key:", API_KEY);


/**
 * ============================================================
 * The Solution: Environment Variables
 * ============================================================
 *
 * Environment variables store sensitive data
 * outside your source code.
 */

console.log("\n===== Using Environment Variables =====");

/**
 * Instead of writing:
 *
 * const password = "123456";
 *
 * We write:
 *
 * const password = process.env.DB_PASSWORD
 */

console.log("Example environment variable:");

console.log(process.env.DB_PASSWORD);


/**
 * ============================================================
 * Example Usage in Backend
 * ============================================================
 *
 * const PORT = process.env.PORT || 3000
 *
 * const DB_URL = process.env.DATABASE_URL
 *
 * const JWT_SECRET = process.env.JWT_SECRET
 */


/**
 * ============================================================
 * Advantages
 * ============================================================
 *
 * ✔ Sensitive data not stored in code
 * ✔ Different configs for dev / production
 * ✔ Safe to publish code on GitHub
 *
 */


/**
 * ============================================================
 * Real Example
 * ============================================================
 *
 * Development server:
 *
 * PORT = 3000
 *
 * Production server:
 *
 * PORT = 80
 *
 * Same code works in both environments.
 *
 */


/**
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ Never store secrets inside code
 * ✔ Use environment variables instead
 * ✔ Access them with process.env
 *
 * ============================================================
 */