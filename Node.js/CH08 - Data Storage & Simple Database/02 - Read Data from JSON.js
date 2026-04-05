/**
 * ============================================================
 * 02 - Read Data from JSON.js
 * ============================================================
 *
 * Goal:
 * - Read data from JSON file
 * - Parse JSON into JavaScript object
 * - Understand async file reading
 *
 * Run:
 * node "02 - Read Data from JSON.js"
 *
 * ============================================================
 */

const fs = require("fs");
const path = require("path");

console.log("===== Reading JSON Database =====");

/**
 * Construct safe file path
 *
 * __dirname = current folder
 */

const filePath = path.join(__dirname, "data", "users.json");

console.log("Database file path:");
console.log(filePath);


/**
 * Read file asynchronously
 */

fs.readFile(filePath, "utf-8", (err, data) => {

    if (err) {
        console.error("Error reading file:", err);
        return;
    }

    console.log("\nRaw file content:");
    console.log(data);

    /**
     * Convert JSON string → JS object
     */

    const users = JSON.parse(data);

    console.log("\nParsed JavaScript object:");
    console.log(users);

    console.log("\nAccessing individual values:");

    users.forEach(user => {
        console.log(`User ${user.id}: ${user.name}`);
    });

});


/**
 * ============================================================
 * WHY JSON.parse() IS NEEDED
 * ============================================================
 *
 * JSON file content is text.
 *
 * Example:
 *
 * "[{ "id":1, "name":"Alice" }]"
 *
 * JSON.parse() converts it into
 * real JavaScript object.
 *
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ fs.readFile() reads files
 * ✔ JSON.parse() converts JSON → object
 * ✔ path.join() builds safe file paths
 *
 * ============================================================
 */