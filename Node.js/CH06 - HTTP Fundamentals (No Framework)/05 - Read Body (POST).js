/**
 * ============================================================
 * 05 - Read Body (POST).js
 * ============================================================
 *
 * Goal:
 * - Read POST request body
 * - Understand request streams
 * - Parse JSON body
 *
 * Run:
 * node "05 - Read Body (POST).js"
 *
 * Test with VSCode Thunder Client or Postman:
 *
 * POST http://localhost:3000/users
 *
 * Body (JSON):
 * {
 *   "name": "Alice"
 * }
 *
 * ============================================================
 */

const http = require("http");

const server = http.createServer((req, res) => {

    const url = req.url;
    const method = req.method;

    /**
     * Only handle POST /users
     */

    if (url === "/users" && method === "POST") {

        let body = "";

        /**
         * req is a stream
         * data event fires when chunk arrives
         */

        req.on("data", (chunk) => {

            body += chunk.toString();

        });

        /**
         * end event fires when all data received
         */

        req.on("end", () => {

            console.log("Raw body:", body);

            /**
             * Convert JSON string → object
             */

            const parsedBody = JSON.parse(body);

            console.log("Parsed body:", parsedBody);

            res.writeHead(200, {
                "Content-Type": "application/json"
            });

            res.end(JSON.stringify({
                success: true,
                message: "User created",
                data: parsedBody
            }));

        });

    } else {

        res.writeHead(404, {
            "Content-Type": "application/json"
        });

        res.end(JSON.stringify({
            success: false,
            message: "Route not found"
        }));

    }

});

server.listen(3000, () => {
    console.log("Server running at http://localhost:3000");
});


/**
 * ============================================================
 * WHY BODY ARRIVES IN CHUNKS
 * ============================================================
 *
 * HTTP request body is a stream.
 *
 * Large request example:
 * - file upload
 * - image upload
 * - video upload
 *
 * Node receives data piece by piece:
 *
 * chunk 1
 * chunk 2
 * chunk 3
 *
 * ============================================================
 * WHY EXPRESS IS EASIER
 * ============================================================
 *
 * Express automatically parses body:
 *
 * app.use(express.json());
 *
 * app.post("/users", (req, res) => {
 *   console.log(req.body);
 * });
 *
 * Pure Node requires manual stream handling.
 *
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ Request body arrives as stream
 * ✔ req.on("data") receives chunks
 * ✔ req.on("end") signals completion
 * ✔ JSON.parse converts body into object
 *
 * ============================================================
 */