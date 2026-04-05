/**
 * ============================================================
 * 03 - Using process.env in Express.js
 * ============================================================
 *
 * Goal:
 * - Use environment variables in an Express server
 * - Configure port and secret keys using process.env
 *
 * Run:
 * npm install express dotenv
 * node "03 - Using process.env in Express.js"
 *
 * ============================================================
 */

/**
 * Load environment variables
 */

require("dotenv").config();

const express = require("express");

const app = express();
app.use(express.json());

console.log("===== Using process.env in Express =====");


/**
 * ============================================================
 * Access Environment Variables
 * ============================================================
 */

const PORT = process.env.PORT || 3000;
const NODE_ENV = process.env.NODE_ENV || "development";
const JWT_SECRET = process.env.JWT_SECRET || "default-secret";


console.log("\nEnvironment configuration:");

console.log("PORT:", PORT);
console.log("NODE_ENV:", NODE_ENV);
console.log("JWT_SECRET:", JWT_SECRET);


/**
 * ============================================================
 * Example Route
 * ============================================================
 */

app.get("/", (req, res) => {
  res.json({
    message: "Server is running",
    environment: NODE_ENV
  });
});


/**
 * ============================================================
 * Example API Using Secret
 * ============================================================
 */

app.get("/config", (req, res) => {

  res.json({
    port: PORT,
    environment: NODE_ENV
  });

});


/**
 * ============================================================
 * Start Server
 * ============================================================
 */

app.listen(PORT, () => {
  console.log(`\nServer running at http://localhost:${PORT}`);
});


/**
 * ============================================================
 * Example .env File
 * ============================================================
 */

console.log("\nExample .env file:");

const exampleEnv = `
PORT=5000
NODE_ENV=production
JWT_SECRET=my-super-secret-key
`;

console.log(exampleEnv);


/**
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ process.env accesses environment variables
 * ✔ dotenv loads variables from .env file
 * ✔ Use environment variables for configuration
 * ✔ Avoid hardcoding secrets in code
 *
 * ============================================================
 */