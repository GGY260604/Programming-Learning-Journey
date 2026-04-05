/**
 * ============================================================
 * 02 - Request URL Method Headers.js
 * ============================================================
 *
 * Goal:
 * - Understand req.url
 * - Understand req.method
 * - Understand req.headers
 *
 * Run:
 * node "02 - Request URL Method Headers.js"
 *
 * Test in browser:
 * http://localhost:3000/test
 *
 * ============================================================
 */

const http = require("http");

console.log("===== Starting Server =====");

const server = http.createServer((req, res) => {

    console.log("\n===== Incoming Request =====");

    /**
     * Request URL
     */
    console.log("URL:", req.url);

    /**
     * Request Method
     */
    console.log("Method:", req.method);

    /**
     * Request Headers
     */
    console.log("Headers:", req.headers);

    /**
     * Send response
     */

    res.writeHead(200, {
        "Content-Type": "text/plain"
    });

    res.end("Request received. Check server console.");

});

server.listen(3000, () => {
    console.log("Server running at http://localhost:3000");
});


/**
 * ============================================================
 * WHAT ARE REQUEST HEADERS?
 * ============================================================
 *
 * Headers contain metadata such as:
 *
 * host
 * user-agent
 * accept
 * content-type
 *
 * Example:
 *
 * {
 *   host: 'localhost:3000',
 *   user-agent: 'Mozilla/5.0...',
 *   accept: 'text/html'
 * }
 *
 * ============================================================
 * COMMON HTTP METHODS
 * ============================================================
 *
 * GET
 * → retrieve data
 *
 * POST
 * → create data
 *
 * PUT
 * → update data
 *
 * DELETE
 * → remove data
 *
 * ============================================================
 * BACKEND EXAMPLE
 * ============================================================
 *
 * GET /users
 * → return users
 *
 * POST /users
 * → create new user
 *
 * DELETE /users/5
 * → delete user
 *
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ req.url tells which path was requested
 * ✔ req.method tells request type
 * ✔ req.headers contain request metadata
 *
 * These are the foundation of building APIs.
 *
 * ============================================================
 */