/**
 * ============================================================
 * 01 - Development vs Production.js
 * ============================================================
 *
 * Goal:
 * - Understand development vs production environments
 * - Learn why configurations change between environments
 *
 * Run:
 * node "01 - Development vs Production.js"
 *
 * ============================================================
 */

console.log("===== Development vs Production =====");

/**
 * ============================================================
 * Development Environment
 * ============================================================
 *
 * This is where developers write and test code.
 */

console.log("\nDevelopment Environment:");

const development = [
  "Runs on local machine",
  "Frequent code changes",
  "Detailed error messages",
  "Debugging tools enabled",
  "Local databases or test data"
];

development.forEach(item => console.log("-", item));


/**
 * ============================================================
 * Production Environment
 * ============================================================
 *
 * This is where real users access your application.
 */

console.log("\nProduction Environment:");

const production = [
  "Runs on cloud servers",
  "Stable and optimized",
  "Errors are hidden from users",
  "Security features enabled",
  "Real database with real users"
];

production.forEach(item => console.log("-", item));


/**
 * ============================================================
 * Example Configuration Differences
 * ============================================================
 */

console.log("\nExample configuration differences:");

const configExample = {
  development: {
    database: "localhost",
    logging: "verbose",
    debugMode: true
  },
  production: {
    database: "cloud-database",
    logging: "minimal",
    debugMode: false
  }
};

console.log(configExample);


/**
 * ============================================================
 * Why This Matters
 * ============================================================
 */

console.log("\nWhy environment separation matters:");

const reasons = [
  "Prevent exposing sensitive information",
  "Optimize performance in production",
  "Allow debugging during development"
];

reasons.forEach(r => console.log("-", r));


/**
 * ============================================================
 * Node.js Environment Variable
 * ============================================================
 */

console.log("\nNode.js uses an environment variable:");

console.log("NODE_ENV");

/**
 * Typical values:
 *
 * NODE_ENV=development
 * NODE_ENV=production
 */

console.log("\nExample:");

const nodeEnv = process.env.NODE_ENV || "development";

console.log("Current environment:", nodeEnv);


/**
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ Development = coding and debugging
 * ✔ Production = real users and optimized systems
 * ✔ Configuration differs between environments
 * ✔ Node uses environment variables for configuration
 *
 * if (nodeEnv === "production") {
 *     enable security
 * }
 * ============================================================
 */