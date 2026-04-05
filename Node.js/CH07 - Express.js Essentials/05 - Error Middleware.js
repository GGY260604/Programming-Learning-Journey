/**
 * ============================================================
 * 05 - Error Middleware.js
 * ============================================================
 *
 * Goal:
 * - Understand Express error middleware
 * - Centralize error handling
 * - Avoid repeating try/catch everywhere
 *
 * Run:
 * node "05 - Error Middleware.js"
 *
 * Test:
 * http://localhost:3000/error
 *
 * ============================================================
 */

const express = require("express");

const app = express();
const PORT = 3000;


/**
 * ============================================================
 * 1️⃣ Normal Route
 * ============================================================
 */

app.get("/", (req, res) => {

    res.json({
        success: true,
        message: "Server is running"
    });

});


/**
 * ============================================================
 * 2️⃣ Route That Throws Error
 * ============================================================
 */

app.get("/error", (req, res, next) => {

    const error = new Error("Something went wrong in the server");

    /**
     * Pass error to error middleware
     */

    next(error);

});


/**
 * ============================================================
 * 3️⃣ Error Handling Middleware
 * ============================================================
 *
 * Express recognizes error middleware by
 * having FOUR parameters.
 */

function errorHandler(err, req, res, next) {

    console.error("Error occurred:", err.message);

    res.status(500).json({
        success: false,
        message: "Internal Server Error",
        error: err.message
    });

}

/**
 * Register error middleware
 */

app.use(errorHandler);


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
 * HOW ERROR FLOW WORKS
 * ============================================================
 *
 * Request →
 * Route →
 * next(error) →
 * Error Middleware →
 * Response
 *
 * ============================================================
 * EXPRESS ERROR MIDDLEWARE RULE
 * ============================================================
 *
 * Must have FOUR parameters:
 *
 * (err, req, res, next)
 *
 * Otherwise Express won't treat it as error handler.
 *
 * ============================================================
 * REAL BACKEND EXAMPLE
 * ============================================================
 *
 * app.get("/users", async (req, res, next) => {
 *
 *     try {
 *
 *         const users = await db.getUsers();
 *         res.json(users);
 *
 *     } catch (error) {
 *
 *         next(error);
 *
 *     }
 *
 * });
 *
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ Use next(error) to forward errors
 * ✔ Error middleware has 4 parameters
 * ✔ Centralized error handling keeps code clean
 *
 * ============================================================
 */