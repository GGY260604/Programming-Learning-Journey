/**
 * ============================================================
 * 03 - Routing by if else.js
 * ============================================================
 *
 * Goal:
 * - Implement basic routing
 * - Use req.url and req.method
 * - Return different responses based on path
 *
 * Run:
 * node "03 - Routing by if else.js"
 *
 * Test in browser:
 * http://localhost:3000/
 * http://localhost:3000/users
 * http://localhost:3000/products
 *
 * ============================================================
 */

const http = require("http");

console.log("===== Starting Routing Server =====");

const server = http.createServer((req, res) => {

    const url = req.url;
    const method = req.method;

    console.log(`Request received: ${method} ${url}`);

    /**
     * Routing logic
     */

    if (url === "/" && method === "GET") {

        res.writeHead(200, { "Content-Type": "text/plain" });
        res.end("Welcome to the homepage!");

    }

    else if (url === "/users" && method === "GET") {

        res.writeHead(200, { "Content-Type": "application/json" });

        const users = [
            { id: 1, name: "Alice" },
            { id: 2, name: "Bob" }
        ];

        res.end(JSON.stringify(users));

    }

    else if (url === "/products" && method === "GET") {

        res.writeHead(200, { "Content-Type": "application/json" });

        const products = [
            { id: 1, name: "Laptop" },
            { id: 2, name: "Phone" }
        ];

        res.end(JSON.stringify(products));

    }

    else {

        /**
         * 404 Not Found
         */

        res.writeHead(404, { "Content-Type": "text/plain" });
        res.end("404 Not Found");

    }

});


server.listen(3000, () => {

    console.log("Server running at http://localhost:3000");

});


/**
 * ============================================================
 * WHAT IS ROUTING?
 * ============================================================
 *
 * Routing maps URL → logic.
 *
 * Example:
 *
 * /users → return user list
 * /products → return product list
 *
 * This determines what response is sent.
 *
 * ============================================================
 * PROBLEM WITH THIS APPROACH
 * ============================================================
 *
 * As project grows:
 *
 * if (url === "/users")
 * else if (url === "/users/create")
 * else if (url === "/users/delete")
 * else if (url === "/products")
 *
 * Code becomes messy.
 *
 * That is why frameworks like Express exist.
 *
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ Routing uses req.url
 * ✔ Routing uses req.method
 * ✔ Different routes return different responses
 * ✔ Express simplifies routing later
 *
 * ============================================================
 */