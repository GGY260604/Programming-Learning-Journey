/**
 * ============================================================
 * 03 - Helmet Security Headers.js
 * ============================================================
 *
 * Goal:
 * - Understand HTTP security headers
 * - Use Helmet middleware in Express
 * - See what headers Helmet adds
 *
 * Run:
 * npm install express helmet
 * node "03 - Helmet Security Headers.js"
 *
 * Then open:
 * http://localhost:3000
 *
 * ============================================================
 */

const express = require("express");
const helmet = require("helmet");

const app = express();
const PORT = 3000;

console.log("===== Helmet Security Headers =====");

/**
 * ============================================================
 * Enable Helmet
 * ============================================================
 *
 * Helmet automatically sets various HTTP headers
 * that improve security.
 */

app.use(helmet());


/**
 * ============================================================
 * Example Route
 * ============================================================
 */

app.get("/", (req, res) => {
  res.send("Helmet security headers are enabled.");
});


/**
 * ============================================================
 * Example Security Headers
 * ============================================================
 */

console.log("\nHelmet adds headers such as:");

const headers = [
  "X-Content-Type-Options",
  "X-Frame-Options",
  "Strict-Transport-Security",
  "X-DNS-Prefetch-Control",
  "X-Download-Options"
];

headers.forEach(header => console.log("-", header));


/**
 * ============================================================
 * Why These Headers Matter
 * ============================================================
 */

console.log("\nThese headers help protect against:");

const protections = [
  "Clickjacking",
  "MIME-type confusion",
  "Insecure transport",
  "Some browser-based attacks"
];

protections.forEach(p => console.log("-", p));


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
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ Helmet improves security with HTTP headers
 * ✔ Easy to enable using app.use(helmet())
 * ✔ Recommended in almost every Express app
 *
 * ============================================================
 */