/**
 * ============================================================
 * 03 - Middleware Concept.js
 * ============================================================
 *
 * Goal:
 * - Understand Express middleware
 * - Learn how next() works
 * - Build custom middleware
 *
 * Run:
 * node "03 - Middleware Concept.js"
 *
 * Test:
 * http://localhost:3000/users
 *
 * ============================================================
 */

const express = require("express");

const app = express();
const PORT = 3000;

/**
 * ============================================================
 * 1️⃣ Middleware Example (Logger)
 * ============================================================
 *
 * Middleware runs BEFORE route handlers.
 */

function loggerMiddleware(req, res, next) {

    console.log(`Request received: ${req.method} ${req.url}`);

    /**
     * next() passes control to next middleware
     */
    next();
}

/**
 * Register middleware
 */

app.use(loggerMiddleware);


/**
 * ============================================================
 * 2️⃣ Another Middleware Example
 * ============================================================
 */

function timeMiddleware(req, res, next) {

    req.requestTime = new Date().toISOString();

    next();
}

app.use(timeMiddleware);


/**
 * ============================================================
 * 3️⃣ Route Handler
 * ============================================================
 */

app.get("/users", (req, res) => {

    res.json({
        success: true,
        message: "Users fetched",
        requestTime: req.requestTime
    });

});


/**
 * ============================================================
 * 4️⃣ Middleware Flow
 * ============================================================
 *
 * Request →
 * Logger Middleware →
 * Time Middleware →
 * Route Handler →
 * Response
 *
 */


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
 * COMMON EXPRESS MIDDLEWARE
 * ============================================================
 *
 * express.json()
 * → parses JSON body
 *
 * cors()
 * → allow cross-origin requests
 *
 * helmet()
 * → security headers
 *
 * morgan()
 * → request logging
 *
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ Middleware runs before route handlers
 * ✔ Middleware can modify req/res
 * ✔ next() passes control forward
 * ✔ Express architecture is middleware-based
 *
 * ============================================================
 */