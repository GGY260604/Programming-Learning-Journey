/**
 * ============================================================
 * 05 - Protected Routes.js
 * ============================================================
 *
 * Goal:
 * - Protect routes using JWT
 * - Build authentication middleware
 * - Read Authorization: Bearer <token>
 *
 * Run:
 * node "05 - Protected Routes.js"
 *
 * Test flow:
 * 1) POST http://localhost:3000/register
 * 2) POST http://localhost:3000/login   -> copy token
 * 3) GET  http://localhost:3000/profile -> add header:
 *      Authorization: Bearer <token>
 *
 * ============================================================
 */

const express = require("express");
const bcrypt = require("bcrypt");
const jwt = require("jsonwebtoken");

const app = express();
app.use(express.json());

const PORT = 3000;

/**
 * In real apps:
 * const SECRET_KEY = process.env.JWT_SECRET;
 * and never hardcode it.
 */
const SECRET_KEY = "my-secret-key";

/**
 * Fake in-memory database
 */
const users = [];

/**
 * ============================================================
 * Auth Middleware
 * ============================================================
 *
 * It checks:
 * - Is there an Authorization header?
 * - Is it Bearer token format?
 * - Can we verify the token?
 *
 * If valid:
 * - attach decoded payload to req.user
 * - call next()
 */
function requireAuth(req, res, next) {
  const authHeader = req.headers.authorization; // e.g. "Bearer xxxxx.yyyyy.zzzzz"

  if (!authHeader) {
    return res.status(401).json({
      success: false,
      message: "Missing Authorization header",
    });
  }

  const parts = authHeader.split(" ");
  const scheme = parts[0];
  const token = parts[1];

  if (scheme !== "Bearer" || !token) {
    return res.status(401).json({
      success: false,
      message: "Invalid Authorization format. Use: Bearer <token>",
    });
  }

  try {
    const decoded = jwt.verify(token, SECRET_KEY);

    // Attach user info for later route handlers
    req.user = decoded;

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
 * Register
 * ============================================================
 */
app.post("/register", async (req, res) => {
  const { email, password } = req.body;

  if (!email || !password) {
    return res.status(400).json({
      success: false,
      message: "Email and password required",
    });
  }

  const existing = users.find((u) => u.email === email);
  if (existing) {
    return res.status(409).json({
      success: false,
      message: "Email already registered",
    });
  }

  const hashed = await bcrypt.hash(password, 10);

  users.push({
    id: users.length + 1,
    email,
    password: hashed,
  });

  res.status(201).json({
    success: true,
    message: "User registered",
  });
});

/**
 * ============================================================
 * Login (returns JWT)
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

  const isMatch = await bcrypt.compare(password, user.password);

  if (!isMatch) {
    return res.status(401).json({
      success: false,
      message: "Invalid credentials",
    });
  }

  const token = jwt.sign(
    { userId: user.id, email: user.email },
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
 * Protected Route Example
 * ============================================================
 *
 * Only accessible if token is valid.
 */
app.get("/profile", requireAuth, (req, res) => {
  res.json({
    success: true,
    message: "Protected profile data",
    user: req.user, // { userId, email, iat, exp }
  });
});

/**
 * Another protected route example
 */
app.get("/admin", requireAuth, (req, res) => {
  // Note: this is still only Authentication (who you are)
  // Authorization (what you can do) comes next chapter.
  res.json({
    success: true,
    message: "You are authenticated (not necessarily admin yet).",
    user: req.user,
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
 * ✔ Protected routes need middleware
 * ✔ Token is sent via Authorization header
 * ✔ Middleware verifies token and calls next()
 * ✔ Decoded payload can be stored in req.user
 *
 * ============================================================
 */