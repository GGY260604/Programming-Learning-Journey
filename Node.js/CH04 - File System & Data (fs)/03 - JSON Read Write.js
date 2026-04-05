/**
 * ============================================================
 * 03 - JSON Read Write.js
 * ============================================================
 *
 * Goal:
 * - Read JSON file
 * - Parse JSON into object
 * - Write object into JSON file
 * - Understand JSON.stringify() & JSON.parse()
 *
 * Run:
 * node "03 - JSON Read Write.js"
 *
 * ============================================================
 */

const fs = require("fs");
const path = require("path");

const filePath = path.join(__dirname, "data.json");

console.log("===== 1️⃣ Writing JSON File =====");

/**
 * Step 1: Create a JavaScript object
 */

const users = [
    { id: 1, name: "Alice", role: "admin" },
    { id: 2, name: "Bob", role: "user" }
];

/**
 * Step 2: Convert object → JSON string
 *
 * JSON.stringify(object, null, 2)
 * null → no replacer
 * 2 → pretty formatting (2 spaces)
 */

const jsonString = JSON.stringify(users, null, 2);

/**
 * Step 3: Write to file
 */

fs.writeFileSync(filePath, jsonString);

console.log("JSON file written successfully.");


console.log("\n===== 2️⃣ Reading JSON File =====");

/**
 * Step 1: Read file as string
 */

const rawData = fs.readFileSync(filePath, "utf-8");

/**
 * Step 2: Convert JSON string → JavaScript object
 */

const parsedData = JSON.parse(rawData);

console.log("Parsed Data:", parsedData);


console.log("\n===== 3️⃣ Modify JSON Data =====");

/**
 * Add a new user
 */

parsedData.push({ id: 3, name: "Charlie", role: "user" });

/**
 * Save back to file
 */

fs.writeFileSync(filePath, JSON.stringify(parsedData, null, 2));

console.log("New user added and saved.");


/**
 * ============================================================
 * VERY IMPORTANT CONCEPT
 * ============================================================
 *
 * JSON file stores TEXT.
 *
 * To use it:
 * - JSON.parse() → string → object
 *
 * To save object:
 * - JSON.stringify() → object → string
 *
 * ============================================================
 * BACKEND STYLE EXAMPLE
 * ============================================================
 *
 * Suppose building small API without database:
 *
 * GET /users
 * → read JSON
 *
 * POST /users
 * → read JSON
 * → push new user
 * → write JSON back
 *
 * ============================================================
 * WARNING
 * ============================================================
 *
 * ❌ Sync file operations block server
 * ❌ JSON file is NOT good for large scale production
 *
 * This is good for:
 * - Learning
 * - Small apps
 * - Mock backend
 *
 * Real production uses:
 * - MySQL
 * - PostgreSQL
 * - MongoDB
 *
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ JSON.stringify() converts object → string
 * ✔ JSON.parse() converts string → object
 * ✔ JSON files are common in backend
 * ✔ Good for small demo backend
 *
 * ============================================================
 */