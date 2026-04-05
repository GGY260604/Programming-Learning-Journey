/**
 * ============================================================
 * 04 - JSON Response.js
 * ============================================================
 *
 * Goal:
 * - Send JSON response properly
 * - Use correct Content-Type
 * - Build consistent API response format
 *
 * Run:
 * node "04 - JSON Response.js"
 *
 * Test in browser:
 * http://localhost:3000/api/user
 * http://localhost:3000/api/error
 *
 * ============================================================
 */

const http = require("http");

const server = http.createServer((req, res) => {

    const url = req.url;
    const method = req.method;

    /**
     * Helper function to send JSON response
     */
    function sendJson(statusCode, data) {
        res.writeHead(statusCode, {
            "Content-Type": "application/json"
        });
        res.end(JSON.stringify(data));
    }

    if (method === "GET" && url === "/api/user") {

        const user = { id: 1, name: "Alice", role: "admin" };

        /**
         * Consistent API response shape
         */
        sendJson(200, {
            success: true,
            message: "User fetched successfully",
            data: user
        });

    } else if (method === "GET" && url === "/api/error") {

        sendJson(400, {
            success: false,
            message: "Bad request example",
            error: "Missing parameter"
        });

    } else {

        sendJson(404, {
            success: false,
            message: "Route not found"
        });

    }

});

server.listen(3000, () => {
    console.log("Server running at http://localhost:3000");
});


/**
 * ============================================================
 * WHY Content-Type MATTERS
 * ============================================================
 *
 * If you send JSON but Content-Type is text/plain:
 * - Browser may display weird
 * - Frontend fetch() may mis-handle response
 *
 * Correct:
 * Content-Type: application/json
 *
 * ============================================================
 * BACKEND BEST PRACTICE
 * ============================================================
 *
 * Always return consistent shape:
 *
 * {
 *   success: true/false,
 *   message: "...",
 *   data: {...}   (optional)
 *   error: "..."  (optional)
 * }
 *
 * This makes frontend handling easier.
 *
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ Use JSON.stringify() before sending
 * ✔ Set Content-Type to application/json
 * ✔ Keep API response structure consistent
 *
 * ============================================================
 */