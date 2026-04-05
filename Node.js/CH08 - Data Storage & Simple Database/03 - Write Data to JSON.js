/**
 * ============================================================
 * 03 - Write Data to JSON.js
 * ============================================================
 *
 * Goal:
 * - Write data to JSON file
 * - Simulate saving data to database
 * - Learn fs.writeFile()
 *
 * Run:
 * node "03 - Write Data to JSON.js"
 *
 * ============================================================
 */

const fs = require("fs");
const path = require("path");

console.log("===== Writing Data to JSON Database =====");

/**
 * Database file path
 */

const filePath = path.join(__dirname, "data", "users.json");

/**
 * Step 1: Read existing users
 */

fs.readFile(filePath, "utf-8", (err, data) => {

    if (err) {
        console.error("Error reading file:", err);
        return;
    }

    const users = JSON.parse(data);

    console.log("Existing users:");
    console.log(users);

    /**
     * Step 2: Create new user
     */

    const newUser = {
        id: users.length + 1,
        name: "Charlie"
    };

    users.push(newUser);

    console.log("\nNew user added:");
    console.log(newUser);

    /**
     * Step 3: Convert object → JSON string
     */

    const updatedData = JSON.stringify(users, null, 2);

    /**
     * Step 4: Write back to file
     */

    fs.writeFile(filePath, updatedData, (err) => {

        if (err) {
            console.error("Error writing file:", err);
            return;
        }

        console.log("\nDatabase updated successfully!");

    });

});


/**
 * ============================================================
 * WHAT JSON.stringify() DOES
 * ============================================================
 *
 * Converts object → JSON text.
 *
 * Example:
 *
 * { id:1, name:"Alice" }
 *
 * becomes
 *
 * {
 *   "id": 1,
 *   "name": "Alice"
 * }
 *
 * The parameters:
 *
 * JSON.stringify(data, null, 2)
 *
 * null → no replacer
 * 2 → pretty indentation
 *
 * ============================================================
 * DATABASE FLOW
 * ============================================================
 *
 * Read file
 *   ↓
 * Parse JSON
 *   ↓
 * Modify data
 *   ↓
 * Convert to JSON
 *   ↓
 * Write back to file
 *
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ fs.writeFile() saves data
 * ✔ JSON.stringify() converts object → JSON
 * ✔ Always read before writing
 *
 * ============================================================
 */