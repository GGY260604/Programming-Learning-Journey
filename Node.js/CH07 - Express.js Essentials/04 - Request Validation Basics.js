/**
 * ============================================================
 * 04 - Request Validation Basics.js
 * ============================================================
 *
 * Goal:
 * - Validate request body
 * - Return proper error responses
 * - Prevent invalid input
 *
 * Run:
 * node "04 - Request Validation Basics.js"
 *
 * Test:
 * POST http://localhost:3000/users
 *
 * Body:
 * {
 *   "name": "Alice"
 * }
 *
 * ============================================================
 */

const express = require("express");

const app = express();
const PORT = 3000;

/**
 * Middleware to parse JSON
 */
app.use(express.json());

/**
 * Mock database
 */
let users = [];


/**
 * ============================================================
 * POST /users
 * Create new user with validation
 * ============================================================
 */

app.post("/users", (req, res) => {

    const { name } = req.body;

    /**
     * Validation
     */

    if (!name) {

        return res.status(400).json({
            success: false,
            message: "Name is required"
        });

    }

    if (typeof name !== "string") {

        return res.status(400).json({
            success: false,
            message: "Name must be a string"
        });

    }

    if (name.length < 2) {

        return res.status(400).json({
            success: false,
            message: "Name must be at least 2 characters"
        });

    }

    /**
     * Create user
     */

    const newUser = {
        id: users.length + 1,
        name
    };

    users.push(newUser);

    res.json({
        success: true,
        message: "User created successfully",
        data: newUser
    });

});


/**
 * Start server
 */

app.listen(PORT, () => {
    console.log(`Server running at http://localhost:${PORT}`);
});


/**
 * ============================================================
 * WHY VALIDATION IS IMPORTANT
 * ============================================================
 *
 * Without validation:
 *
 * POST /users
 *
 * {
 *   "name": ""
 * }
 *
 * Or even:
 *
 * {
 *   "name": 12345
 * }
 *
 * Your database becomes messy or corrupted.
 *
 * ============================================================
 * REAL BACKEND PRACTICE
 * ============================================================
 *
 * Most real projects use libraries like:
 *
 * Joi
 * Zod
 * express-validator
 *
 * But manual validation helps you understand the logic.
 *
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ Always validate request input
 * ✔ Return HTTP 400 for invalid data
 * ✔ Validate type, length, required fields
 *
 * ============================================================
 */