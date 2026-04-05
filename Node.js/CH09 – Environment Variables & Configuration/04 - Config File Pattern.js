/**
 * ============================================================
 * 04 - Config File Pattern.js
 * ============================================================
 *
 * Goal:
 * - Centralize environment configuration
 * - Avoid using process.env everywhere
 * - Implement a professional config pattern
 *
 * Run:
 * node "04 - Config File Pattern.js"
 *
 * ============================================================
 */

require("dotenv").config();

console.log("===== Config Pattern Example =====");

/**
 * Instead of accessing process.env everywhere,
 * we create a configuration object.
 */

const config = {

    PORT: process.env.PORT || 3000,

    DATABASE_URL: process.env.DATABASE_URL || "mongodb://localhost:27017/dev",

    JWT_SECRET: process.env.JWT_SECRET || "default-secret",

    NODE_ENV: process.env.NODE_ENV || "development"

};


/**
 * Now the entire backend can import config
 */

console.log("Server Port:", config.PORT);
console.log("Database URL:", config.DATABASE_URL);
console.log("JWT Secret:", config.JWT_SECRET);
console.log("Environment:", config.NODE_ENV);


/**
 * ============================================================
 * Real Backend Structure
 * ============================================================
 *
 * config/
 *    config.js
 *
 */

console.log("\n===== Real Project Structure =====");

console.log(`
project/
  src/
    config/
        config.js
    routes/
    controllers/
    services/
`);


/**
 * ============================================================
 * Example config/config.js
 * ============================================================
 *
 * require("dotenv").config();
 *
 * module.exports = {
 *   PORT: process.env.PORT || 3000,
 *   DATABASE_URL: process.env.DATABASE_URL,
 *   JWT_SECRET: process.env.JWT_SECRET
 * };
 *
 */


/**
 * ============================================================
 * Example usage in server.js
 * ============================================================
 *
 * const config = require("./config/config");
 *
 * app.listen(config.PORT);
 *
 */


/**
 * ============================================================
 * Why this pattern is good
 * ============================================================
 *
 * Without config pattern:
 *
 * process.env.PORT
 * process.env.PORT
 * process.env.PORT
 *
 * everywhere in the codebase.
 *
 * With config pattern:
 *
 * config.PORT
 *
 * Much cleaner.
 */


/**
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ Centralize environment variables
 * ✔ Avoid using process.env everywhere
 * ✔ Use a config module
 * ✔ Easier to manage backend settings
 *
 * ============================================================
 */