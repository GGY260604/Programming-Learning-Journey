/**
 * ============================================================
 * 04 - Rate Limiting.js
 * ============================================================
 *
 * Goal:
 * - Understand rate limiting
 * - Limit how many requests a client can make
 * - Protect APIs from abuse
 *
 * Run:
 * npm install express express-rate-limit
 * node "04 - Rate Limiting.js"
 *
 * ============================================================
 */

const express = require("express");
const rateLimit = require("express-rate-limit");

const app = express();
const PORT = 3000;

console.log("===== Rate Limiting Example =====");

/**
 * ============================================================
 * Create Rate Limiter
 * ============================================================
 *
 * windowMs = time window
 * max = maximum number of requests allowed in that window
 */

const limiter = rateLimit({
  windowMs: 60 * 1000, // 1 minute
  max: 5, // max 5 requests per minute
  message: {
    success: false,
    message: "Too many requests. Please try again later."
  }
});

/**
 * Apply rate limiter globally
 */

app.use(limiter);


/**
 * Example API
 */

app.get("/", (req, res) => {
  res.json({
    message: "Request successful"
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
 * Example Behavior
 * ============================================================
 *
 * Client requests:
 *
 * 1 → success
 * 2 → success
 * 3 → success
 * 4 → success
 * 5 → success
 * 6 → blocked
 *
 */


/**
 * ============================================================
 * Example: Protect Only Login Route
 * ============================================================
 *
 * const loginLimiter = rateLimit({
 *   windowMs: 15 * 60 * 1000,
 *   max: 5
 * });
 *
 * app.post("/login", loginLimiter, loginHandler);
 *
 */


/**
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ Rate limiting prevents abuse
 * ✔ Limits number of requests per time window
 * ✔ Useful for login and authentication endpoints
 * ✔ Protects backend resources
 *
 * ============================================================
 */