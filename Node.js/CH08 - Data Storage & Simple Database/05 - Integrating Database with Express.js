/**
 * ============================================================
 * 05 - Integrating Database with Express.js
 * ============================================================
 *
 * Goal:
 * - Connect Express API with database functions
 * - Build a persistent REST API
 *
 * Run:
 * node "05 - Integrating Database with Express.js"
 *
 * Test:
 * GET    http://localhost:3000/users
 * POST   http://localhost:3000/users
 * DELETE http://localhost:3000/users/1
 *
 * ============================================================
 */

const express = require("express");
const fs = require("fs").promises;
const path = require("path");

const app = express();
const PORT = 3000;

app.use(express.json());

const filePath = path.join(__dirname, "data", "users.json");


/**
 * ============================================================
 * Database Functions
 * ============================================================
 */

async function getUsers() {

    const data = await fs.readFile(filePath, "utf-8");

    return JSON.parse(data);

}


async function addUser(name) {

    const users = await getUsers();

    const newUser = {
        id: users.length + 1,
        name
    };

    users.push(newUser);

    await fs.writeFile(
        filePath,
        JSON.stringify(users, null, 2)
    );

    return newUser;

}


async function deleteUser(id) {

    const users = await getUsers();

    const filteredUsers = users.filter(user => user.id !== id);

    await fs.writeFile(
        filePath,
        JSON.stringify(filteredUsers, null, 2)
    );

    return filteredUsers;

}


/**
 * ============================================================
 * API ROUTES
 * ============================================================
 */


/**
 * GET /users
 */

app.get("/users", async (req, res) => {

    const users = await getUsers();

    res.json({
        success: true,
        data: users
    });

});


/**
 * POST /users
 */

app.post("/users", async (req, res) => {

    const { name } = req.body;

    if (!name) {
        return res.status(400).json({
            success: false,
            message: "Name is required"
        });
    }

    const newUser = await addUser(name);

    res.json({
        success: true,
        message: "User created",
        data: newUser
    });

});


/**
 * DELETE /users/:id
 */

app.delete("/users/:id", async (req, res) => {

    const id = parseInt(req.params.id);

    await deleteUser(id);

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
 * WHAT YOU JUST BUILT
 * ============================================================
 *
 * A complete mini backend:
 *
 * Express API
 *      ↓
 * Database functions
 *      ↓
 * JSON file storage
 *
 * Data persists even if server restarts.
 *
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ Express handles HTTP requests
 * ✔ Database layer manages data
 * ✔ JSON file simulates database
 * ✔ Backend now has persistent storage
 *
 * ============================================================
 */