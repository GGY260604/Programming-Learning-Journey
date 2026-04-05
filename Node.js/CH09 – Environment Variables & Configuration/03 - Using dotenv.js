/**
 * ============================================================
 * 03 - Using dotenv.js
 * ============================================================
 *
 * Goal:
 * - Load environment variables from .env file
 * - Use dotenv package
 *
 * Run:
 * node "03 - Using dotenv.js"
 *
 * ============================================================
 */

require("dotenv").config();

console.log("===== Loading Environment Variables =====");

/**
 * dotenv loads variables from .env
 * and injects them into process.env
 */

console.log("PORT:", process.env.PORT);
console.log("DATABASE_URL:", process.env.DATABASE_URL);
console.log("JWT_SECRET:", process.env.JWT_SECRET);


/**
 * Example usage in backend server
 */

const PORT = process.env.PORT || 3000;

console.log("\nServer will run on port:", PORT);


/**
 * ============================================================
 * How dotenv works
 * ============================================================
 *
 * .env file:
 *
 * PORT=4000
 * DATABASE_URL=...
 *
 * dotenv reads the file and sets:
 *
 * process.env.PORT
 * process.env.DATABASE_URL
 *
 */


/**
 * ============================================================
 * Backend Best Practice
 * ============================================================
 *
 * NEVER commit:
 *
 * .env
 *
 * Instead commit:
 *
 * .env.example
 *
 */


/**
 * Example .env.example
 *
 * PORT=
 * DATABASE_URL=
 * JWT_SECRET=
 */


/**
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ dotenv loads variables from .env
 * ✔ process.env stores environment variables
 * ✔ .env should not be committed to GitHub
 *
 * ============================================================
 */