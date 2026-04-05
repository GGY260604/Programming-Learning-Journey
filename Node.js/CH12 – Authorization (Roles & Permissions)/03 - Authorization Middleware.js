/**
 * ============================================================
 * 03 - Authorization Middleware.js
 * ============================================================
 *
 * Goal:
 * - Build auth middleware (JWT verification)
 * - Build authorization middleware (role/permission checks)
 * - Protect routes using middleware chain
 *
 * Run:
 * npm install express bcrypt jsonwebtoken
 * node "03 - Authorization Middleware.js"
 *
 * Test flow:
 * 1) Register a normal user (role=user)
 * 2) Register an admin user (role=admin)
 * 3) Login to get token
 * 4) Call protected endpoints with Authorization header
 *
 * ============================================================
 */

const express = require("express");
const bcrypt = require("bcrypt");
const jwt = require("jsonwebtoken");

const app = express();
app.use(express.json());

const PORT = 3000;
const SECRET_KEY = "my-secret-key";

/**
 * Fake database (in-memory)
 * Each user has: id, email, passwordHash, role
 */
const users = [];

/**
 * RBAC mapping
 */
const RBAC = {
  user: ["read_profile"],
  admin: ["read_profile", "delete_user"],
};

/**
 * ============================================================
 * 1️⃣ Authentication Middleware
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
 * 2️⃣ Authorization Middleware (Role Check)
 * ============================================================
 */
function requireRole(...allowedRoles) {
  return (req, res, next) => {
    const role = req.user?.role;

    if (!role) {
      return res.status(403).json({
        success: false,
        message: "Role missing in token",
      });
    }

    if (!allowedRoles.includes(role)) {
      return res.status(403).json({
        success: false,
        message: "Forbidden: insufficient role",
      });
    }

    next();
  };
}

/**
 * ============================================================
 * 3️⃣ Authorization Middleware (Permission Check)
 * ============================================================
 */
function requirePermission(permission) {
  return (req, res, next) => {
    const role = req.user?.role;

    const allowed = RBAC[role] || [];
    const ok = allowed.includes(permission);

    if (!ok) {
      return res.status(403).json({
        success: false,
        message: `Forbidden: missing permission '${permission}'`,
      });
    }

    next();
  };
}

/**
 * ============================================================
 * Register
 * ============================================================
 *
 * Body:
 * { "email": "...", "password": "...", "role": "user" | "admin" }
 *
 * NOTE (learning purpose):
 * - Real apps NEVER allow users to register as admin freely.
 * - Admin roles are assigned internally.
 */
app.post("/register", async (req, res) => {
  const { email, password, role } = req.body;

  if (!email || !password) {
    return res.status(400).json({
      success: false,
      message: "Email and password required",
    });
  }

  const safeRole = role === "admin" ? "admin" : "user";

  const exists = users.find((u) => u.email === email);
  if (exists) {
    return res.status(409).json({
      success: false,
      message: "Email already registered",
    });
  }

  const passwordHash = await bcrypt.hash(password, 10);

  const newUser = {
    id: users.length + 1,
    email,
    passwordHash,
    role: safeRole,
  };

  users.push(newUser);

  res.status(201).json({
    success: true,
    message: "Registered",
    data: { id: newUser.id, email: newUser.email, role: newUser.role },
  });
});

/**
 * ============================================================
 * Login -> returns token with role inside payload
 * ============================================================
 */
app.post("/login", async (req, res) => {
  const { email, password } = req.body;

  const user = users.find((u) => u.email === email);

  if (!user) {
    return res.status(401).json({
      success: false,
      message: "Invalid credentials",
    });
  }

  const isMatch = await bcrypt.compare(password, user.passwordHash);

  if (!isMatch) {
    return res.status(401).json({
      success: false,
      message: "Invalid credentials",
    });
  }

  const token = jwt.sign(
    { userId: user.id, email: user.email, role: user.role },
    SECRET_KEY,
    { expiresIn: "1h" }
  );

  res.json({
    success: true,
    message: "Login successful",
    token,
  });
});

/**
 * ============================================================
 * Protected Route: any logged-in user
 * ============================================================
 */
app.get("/profile", requireAuth, (req, res) => {
  res.json({
    success: true,
    message: "Profile data (requires login)",
    userFromToken: req.user,
  });
});

/**
 * ============================================================
 * Protected Route: role-based (admin only)
 * ============================================================
 */
app.get("/admin", requireAuth, requireRole("admin"), (req, res) => {
  res.json({
    success: true,
    message: "Admin area (requires admin role)",
    userFromToken: req.user,
  });
});

/**
 * ============================================================
 * Protected Route: permission-based (delete_user)
 * ============================================================
 */
app.delete(
  "/users/:id",
  requireAuth,
  requirePermission("delete_user"),
  (req, res) => {
    res.json({
      success: true,
      message: `Allowed to delete user ${req.params.id} (permission check passed)`,
      userFromToken: req.user,
    });
  }
);

app.listen(PORT, () => {
  console.log(`Server running at http://localhost:${PORT}`);
});

/**
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ requireAuth verifies identity (JWT)
 * ✔ requireRole checks role-based access
 * ✔ requirePermission checks permission-based access (RBAC)
 * ✔ Middleware chain controls access cleanly
 *
 * ============================================================
 */