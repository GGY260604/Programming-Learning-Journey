/**
 * ============================================================
 * 01 - Create Basic Server http.js
 * ============================================================
 *
 * Goal:
 * - Understand Node HTTP module
 * - Create a basic backend server
 * - Send responses to browser
 *
 * Run:
 * node "01 - Create Basic Server http.js"
 *
 * Then open browser:
 * http://localhost:3000
 *
 * ============================================================
 */

const http = require("http");

console.log("===== Creating HTTP Server =====");

/**
 * createServer()
 * receives a callback function
 *
 * req = request object
 * res = response object
 */

const server = http.createServer((req, res) => {

    console.log("Request received!");

    /**
     * Set response header
     */

    res.writeHead(200, {
        "Content-Type": "text/plain"
    });

    /**
     * Send response
     */

    res.end("Hello from Node.js server!");

});

/**
 * Start server
 */

const PORT = 3000;

server.listen(PORT, () => {

    console.log(`Server running at http://localhost:${PORT}`);

});


/**
 * ============================================================
 * WHAT JUST HAPPENED?
 * ============================================================
 *
 * 1. Browser sends request
 * 2. Node server receives request
 * 3. Callback runs
 * 4. Server sends response
 *
 * Request → Server → Response
 *
 * ============================================================
 * IMPORTANT CONCEPT
 * ============================================================
 *
 * HTTP server is event-driven.
 *
 * Every incoming request triggers the callback.
 *
 * req → request details
 * res → send response
 *
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ http.createServer() creates server
 * ✔ req = request info
 * ✔ res = response to client
 * ✔ server.listen() starts server
 *
 * ============================================================
 */