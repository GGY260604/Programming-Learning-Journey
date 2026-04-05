/**
 * ============================================================
 * 04 - Basic Logging.js
 * ============================================================
 *
 * Goal:
 * - Understand backend logging
 * - Log requests and errors
 * - See how logs help debugging
 *
 * Run:
 * npm install express
 * node "04 - Basic Logging.js"
 *
 * ============================================================
 */

const express = require("express");

const app = express();
app.use(express.json());

const PORT = 3000;

console.log("===== Basic Logging Example =====");

/**
 * ============================================================
 * Request Logging Middleware
 * ============================================================
 *
 * Logs every incoming request
 */

app.use((req, res, next) => {

  const time = new Date().toISOString();

  console.log(`[${time}] ${req.method} ${req.url}`);

  next();

});


/**
 * ============================================================
 * Example Route
 * ============================================================
 */

app.get("/", (req, res) => {

  console.log("Handling root route");

  res.json({
    message: "Hello from server"
  });

});


/**
 * ============================================================
 * Example Error Logging
 * ============================================================
 */

app.get("/error", (req, res) => {

  console.error("Example error occurred");

  res.status(500).json({
    message: "Something went wrong"
  });

});


/**
 * ============================================================
 * Start Server
 * ============================================================
 */

app.listen(PORT, () => {
  console.log(`Server running at http://localhost:${PORT}`);
});


/**
 * ============================================================
 * Example Log Output
 * ============================================================
 *
 * [2026-03-05T10:00:00.000Z] GET /
 * Handling root route
 *
 * [2026-03-05T10:00:10.000Z] GET /error
 * Example error occurred
 *
 */


/**
 * ============================================================
 * Why Logging Is Important
 * ============================================================
 */

console.log("\nWhy logging matters:");

const reasons = [
  "Debug application errors",
  "Track user requests",
  "Monitor server activity",
  "Investigate production issues"
];

reasons.forEach(r => console.log("-", r));


/**
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ Logging records server activity
 * ✔ Helps debugging backend issues
 * ✔ Request logging middleware tracks API usage
 *
 * ============================================================
 */