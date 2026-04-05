/**
 * ============================================================
 * 04 - Admin Route Example.js
 * ============================================================
 *
 * Goal:
 * - Focus only on role-based authorization (admin route)
 * - Show the cleanest, simplest example
 *
 * Run:
 * npm install express jsonwebtoken
 * node "04 - Admin Route Example.js"
 *
 * Test:
 * GET http://localhost:3000/admin
 *
 * Use these tokens (generated on server start) in header:
 * Authorization: Bearer <TOKEN>
 *
 * ============================================================
 */

const express = require("express");
const jwt = require("jsonwebtoken");

const app = express();
const PORT = 3000;
const SECRET_KEY = "my-secret-key";

/**
 * ============================================================
 * Demo: Create 2 tokens (one user, one admin)
 * ============================================================
 *
 * In real projects, tokens are created after login.
 * Here we generate them directly for learning.
 */

const userToken = jwt.sign(
  { userId: 1, email: "user@example.com", role: "user" },
  SECRET_KEY,
  { expiresIn: "1h" }
);

const adminToken = jwt.sign(
  { userId: 2, email: "admin@example.com", role: "admin" },
  SECRET_KEY,
  { expiresIn: "1h" }
);

console.log("===== Demo Tokens (copy one) =====");
console.log("User token (role=user):");
console.log(userToken);
console.log("\nAdmin token (role=admin):");
console.log(adminToken);
console.log("==================================\n");

/**
 * ============================================================
 * 1️⃣ Authentication Middleware (JWT)
 * ============================================================
 */
function requireAuth(req, res, next) {
  const authHeader = req.headers.authorization;

  if (!authHeader) {
    return res.status(401).json({
      success: false,
      message: "Missing Authorization header",
    });
  }

  const [scheme, token] = authHeader.split(" ");

  if (scheme !== "Bearer" || !token) {
    return res.status(401).json({
      success: false,
      message: "Invalid Authorization format. Use: Bearer <token>",
    });
  }

  try {
    const decoded = jwt.verify(token, SECRET_KEY);
    req.user = decoded; // { userId, email, role, iat, exp }
    next();
  } catch (err) {
    return res.status(401).json({
      success: false,
      message: "Invalid or expired token",
    });
  }
}

/**
 * ============================================================
 * 2️⃣ Authorization Middleware (Admin Only)
 * ============================================================
 */
function requireAdmin(req, res, next) {
  if (req.user?.role !== "admin") {
    return res.status(403).json({
      success: false,
      message: "Forbidden: admin only",
    });
  }

  next();
}

/**
 * ============================================================
 * Public route
 * ============================================================
 */
app.get("/", (req, res) => {
  res.json({
    success: true,
    message: "Public route. Anyone can access.",
  });
});

/**
 * ============================================================
 * Protected route: must be logged in
 * ============================================================
 */
app.get("/profile", requireAuth, (req, res) => {
  res.json({
    success: true,
    message: "Logged-in profile route",
    userFromToken: req.user,
  });
});

/**
 * ============================================================
 * Admin route: must be logged in + admin role
 * ============================================================
 */
app.get("/admin", requireAuth, requireAdmin, (req, res) => {
  res.json({
    success: true,
    message: "Welcome admin! ✅",
    userFromToken: req.user,
  });
});

app.listen(PORT, () => {
  console.log(`Server running at http://localhost:${PORT}`);
});

/**
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ requireAuth: checks token is valid (authentication)
 * ✔ requireAdmin: checks role is admin (authorization)
 *
 * /admin route is protected by BOTH:
 * requireAuth -> requireAdmin -> handler
 *
 * ============================================================
 */