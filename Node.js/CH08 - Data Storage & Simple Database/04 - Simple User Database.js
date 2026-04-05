/**
 * ============================================================
 * 04 - Simple User Database.js
 * ============================================================
 *
 * Goal:
 * - Create reusable database functions
 * - Simulate a small database module
 * - Implement CRUD-like operations
 *
 * Run:
 * node "04 - Simple User Database.js"
 *
 * ============================================================
 */

const fs = require("fs").promises;
const path = require("path");

const filePath = path.join(__dirname, "data", "users.json");


/**
 * ============================================================
 * Database Functions
 * ============================================================
 */


/**
 * Get all users
 */
async function getUsers() {

    const data = await fs.readFile(filePath, "utf-8");

    return JSON.parse(data);

}


/**
 * Add a new user
 */
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


/**
 * Delete a user
 */
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
 * Example Usage
 * ============================================================
 */

async function runDemo() {

    console.log("===== Current Users =====");

    const users = await getUsers();

    console.log(users);


    console.log("\n===== Adding New User =====");

    const newUser = await addUser("David");

    console.log("Added:", newUser);


    console.log("\n===== Users After Insert =====");

    console.log(await getUsers());


    console.log("\n===== Deleting User ID 1 =====");

    await deleteUser(1);

    console.log(await getUsers());

}


runDemo();


/**
 * ============================================================
 * WHY THIS PATTERN IS IMPORTANT
 * ============================================================
 *
 * Instead of writing file logic everywhere:
 *
 * fs.readFile(...)
 * fs.writeFile(...)
 *
 * We centralize it into database functions.
 *
 * Later your Express API can call:
 *
 * getUsers()
 * addUser()
 * deleteUser()
 *
 * This separates:
 *
 * API logic
 * from
 * database logic
 *
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ Database logic should be reusable
 * ✔ Use async/await for cleaner code
 * ✔ Separate database layer from API
 *
 * ============================================================
 */