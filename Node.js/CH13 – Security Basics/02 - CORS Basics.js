/**
 * ============================================================
 * 02 - CORS Basics.js
 * ============================================================
 *
 * Goal:
 * - Understand what CORS is
 * - Enable CORS in Express
 * - Restrict which origins can access the API
 *
 * Run:
 * npm install express cors
 * node "02 - CORS Basics.js"
 *
 * ============================================================
 */

const express = require("express");
const cors = require("cors");

const app = express();
const PORT = 3000;

console.log("===== CORS Basics =====");

/**
 * ============================================================
 * What is CORS?
 * ============================================================
 *
 * CORS = Cross-Origin Resource Sharing
 *
 * It controls which websites are allowed
 * to access your backend API.
 */

console.log("\nCORS controls which domains can access your API.");


/**
 * ============================================================
 * Example Problem
 * ============================================================
 */

console.log("\nExample:");

console.log("Frontend: http://localhost:5173");
console.log("Backend : http://localhost:3000");

console.log("\nBrowser may block request due to CORS policy.");


/**
 * ============================================================
 * Enable CORS (Allow all origins)
 * ============================================================
 */

app.use(cors());

/**
 * This allows ANY website to access the API.
 * Good for testing, but not recommended for production.
 */


/**
 * ============================================================
 * Example API
 * ============================================================
 */

app.get("/api/data", (req, res) => {
  res.json({
    message: "This API allows cross-origin requests."
  });
});


/**
 * ============================================================
 * Example: Restrict CORS (recommended for production)
 * ============================================================
 *
 * Example configuration:
 *
 * const corsOptions = {
 *   origin: "http://localhost:5173"
 * };
 *
 * app.use(cors(corsOptions));
 *
 */


/**
 * ============================================================
 * Start server
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
 * ✔ Browsers enforce CORS
 * ✔ Backends must allow frontend origins
 * ✔ cors() middleware enables CORS in Express
 * ✔ Restrict origins in production
 *
 * ============================================================
 */