/**
 * ============================================================
 * 05 - Ownership Authorization (user can edit own data).js
 * ============================================================
 *
 * Goal:
 * - Implement "ownership" authorization
 * - Rule:
 *   - user can update their own user record
 *   - admin can update anyone
 *
 * Run:
 * npm install express jsonwebtoken
 * node "05 - Ownership Authorization (user can edit own data).js"
 *
 * Test:
 * PUT http://localhost:3000/users/1  (with user token for userId=1) ✅
 * PUT http://localhost:3000/users/2  (with user token for userId=1) ❌
 * PUT http://localhost:3000/users/2  (with admin token) ✅
 *
 * Header:
 * Authorization: Bearer <token>
 *
 * Body:
 * { "name": "New Name" }
 *
 * ============================================================
 */

const express = require("express");
const jwt = require("jsonwebtoken");

const app = express();
app.use(express.json());

const PORT = 3000;
const SECRET_KEY = "my-secret-key";

/**
 * Fake database
 */
let users = [
  { id: 1, name: "Alice", role: "user" },
  { id: 2, name: "Bob", role: "user" },
  { id: 3, name: "Carol", role: "admin" },
];

/**
 * Demo tokens
 * - userToken represents Alice (userId=1)
 * - adminToken represents Carol (userId=3, role=admin)
 */
const userToken = jwt.sign(
  { userId: 1, email: "alice@example.com", role: "user" },
  SECRET_KEY,
  { expiresIn: "1h" }
);

const adminToken = jwt.sign(
  { userId: 3, email: "carol@example.com", role: "admin" },
  SECRET_KEY,
  { expiresIn: "1h" }
);

console.log("===== Demo Tokens (copy one) =====");
console.log("User token (Alice, userId=1):");
console.log(userToken);
console.log("\nAdmin token (Carol, role=admin):");
console.log(adminToken);
console.log("==================================\n");

/**
 * ============================================================
 * Authentication Middleware
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
    req.user = jwt.verify(token, SECRET_KEY);
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
 * Ownership Middleware
 * ============================================================
 *
 * Allows access if:
 * - current user is admin
 * OR
 * - current userId matches :id
 */
function requireOwnerOrAdmin(req, res, next) {
  const paramId = Number(req.params.id);
  const currentUserId = req.user?.userId;
  const role = req.user?.role;

  if (role === "admin") return next();

  if (currentUserId === paramId) return next();

  return res.status(403).json({
    success: false,
    message: "Forbidden: you can only modify your own data",
  });
}

/**
 * ============================================================
 * GET /users
 * (Just to see fake DB)
 * ============================================================
 */
app.get("/users", (req, res) => {
  res.json({
    success: true,
    data: users,
  });
});

/**
 * ============================================================
 * PUT /users/:id
 * Protected by:
 * - requireAuth
 * - requireOwnerOrAdmin
 * ============================================================
 */
app.put("/users/:id", requireAuth, requireOwnerOrAdmin, (req, res) => {
  const id = Number(req.params.id);
  const { name } = req.body;

  if (!name || typeof name !== "string") {
    return res.status(400).json({
      success: false,
      message: "Name is required and must be a string",
    });
  }

  const user = users.find((u) => u.id === id);

  if (!user) {
    return res.status(404).json({
      success: false,
      message: "User not found",
    });
  }

  user.name = name;

  res.json({
    success: true,
    message: "User updated",
    data: user,
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
 * ✔ Authorization is not only "admin or not"
 * ✔ Ownership checks are very common:
 *   - user can edit their own record
 *   - admin can edit anyone
 *
 * Middleware chain:
 * requireAuth -> requireOwnerOrAdmin -> route handler
 *
 * ============================================================
 */