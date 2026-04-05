/**
 * ============================================================
 * 02 - Routes GET POST PUT DELETE.js
 * ============================================================
 *
 * Goal:
 * - Understand REST API routes
 * - Implement GET, POST, PUT, DELETE
 * - Learn Express routing structure
 *
 * Run:
 * node "02 - Routes GET POST PUT DELETE.js"
 *
 * Test using browser / Thunder Client / Postman
 *
 * ============================================================
 */

const express = require("express");

const app = express();
const PORT = 3000;

/**
 * Middleware to parse JSON request body
 */
app.use(express.json());

/**
 * Mock database
 */

let users = [
    { id: 1, name: "Alice" },
    { id: 2, name: "Bob" }
];


/**
 * ============================================================
 * GET /users
 * Retrieve all users
 * ============================================================
 */

app.get("/users", (req, res) => {

    res.json({
        success: true,
        data: users
    });

});


/**
 * ============================================================
 * POST /users
 * Create a new user
 * ============================================================
 */

app.post("/users", (req, res) => {

    const newUser = {
        id: users.length + 1,
        name: req.body.name
    };

    users.push(newUser);

    res.json({
        success: true,
        message: "User created",
        data: newUser
    });

});


/**
 * ============================================================
 * PUT /users/:id
 * Update existing user
 * ============================================================
 */

app.put("/users/:id", (req, res) => {

    const id = parseInt(req.params.id);

    const user = users.find(u => u.id === id);

    if (!user) {
        return res.status(404).json({
            success: false,
            message: "User not found"
        });
    }

    user.name = req.body.name;

    res.json({
        success: true,
        message: "User updated",
        data: user
    });

});


/**
 * ============================================================
 * DELETE /users/:id
 * Remove user
 * ============================================================
 */

app.delete("/users/:id", (req, res) => {

    const id = parseInt(req.params.id);

    users = users.filter(u => u.id !== id);

    res.json({
        success: true,
        message: "User deleted"
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
 * WHAT IS :id ?
 * ============================================================
 *
 * :id is a route parameter.
 *
 * Example request:
 *
 * PUT /users/2
 *
 * Access using:
 *
 * req.params.id
 *
 * ============================================================
 * WHAT IS req.body ?
 * ============================================================
 *
 * req.body contains POST/PUT request data.
 *
 * Example JSON request body:
 *
 * {
 *   "name": "Charlie"
 * }
 *
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ app.get() retrieve data
 * ✔ app.post() create data
 * ✔ app.put() update data
 * ✔ app.delete() remove data
 * ✔ req.params for URL parameters
 * ✔ req.body for request data
 *
 * ============================================================
 */