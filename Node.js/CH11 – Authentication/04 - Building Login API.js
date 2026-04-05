/**
 * ============================================================
 * 04 - Building Login API.js
 * ============================================================
 *
 * Goal:
 * - Build a simple login API
 * - Hash passwords with bcrypt
 * - Generate JWT token after login
 *
 * Run:
 * node "04 - Building Login API.js"
 *
 * Test:
 * POST http://localhost:3000/login
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
 * ============================================================
 * Fake Database
 * ============================================================
 */

const users = [];


/**
 * ============================================================
 * Register API
 * ============================================================
 */

app.post("/register", async (req, res) => {

    const { email, password } = req.body;

    if (!email || !password) {
        return res.status(400).json({
            success: false,
            message: "Email and password required"
        });
    }

    const hashedPassword = await bcrypt.hash(password, 10);

    const newUser = {
        id: users.length + 1,
        email,
        password: hashedPassword
    };

    users.push(newUser);

    res.json({
        success: true,
        message: "User registered"
    });

});


/**
 * ============================================================
 * Login API
 * ============================================================
 */

app.post("/login", async (req, res) => {

    const { email, password } = req.body;

    const user = users.find(u => u.email === email);

    if (!user) {
        return res.status(401).json({
            success: false,
            message: "Invalid credentials"
        });
    }

    const isMatch = await bcrypt.compare(password, user.password);

    if (!isMatch) {
        return res.status(401).json({
            success: false,
            message: "Invalid credentials"
        });
    }

    /**
     * Generate JWT token
     */

    const token = jwt.sign(
        { userId: user.id, email: user.email },
        SECRET_KEY,
        { expiresIn: "1h" }
    );

    res.json({
        success: true,
        message: "Login successful",
        token
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
 * Login Flow
 * ============================================================
 *
 * Register:
 * POST /register
 *
 * Login:
 * POST /login
 *
 * Response:
 * {
 *   "token": "JWT_TOKEN"
 * }
 *
 * ============================================================
 */