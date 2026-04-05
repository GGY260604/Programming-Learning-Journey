/**
 * ============================================================
 * 01 - Setup Express Server.js
 * ============================================================
 *
 * Goal:
 * - Install and run Express
 * - Create a simple Express server
 * - Understand app.listen()
 *
 * Run:
 * node "01 - Setup Express Server.js"
 *
 * Open browser:
 * http://localhost:3000
 *
 * ============================================================
 */

const express = require("express");

/**
 * Create Express application
 */

const app = express();

console.log("Express server starting...");

/**
 * Define a route
 *
 * GET /
 */

app.get("/", (req, res) => {

    res.send("Hello from Express server!");

});


/**
 * Start the server
 */

const PORT = 3000;

app.listen(PORT, () => {

    console.log(`Server running at http://localhost:${PORT}`);

});


/**
 * ============================================================
 * WHAT IS EXPRESS?
 * ============================================================
 *
 * Express is a minimal Node.js web framework.
 *
 * It simplifies:
 * - routing
 * - request parsing
 * - middleware
 * - API creation
 *
 * ============================================================
 * EXPRESS VS PURE NODE
 * ============================================================
 *
 * Pure Node:
 *
 * const server = http.createServer(...)
 *
 * Express:
 *
 * const app = express()
 *
 * Much cleaner and easier.
 *
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ express() creates app
 * ✔ app.get() defines route
 * ✔ res.send() sends response
 * ✔ app.listen() starts server
 *
 * ============================================================
 */