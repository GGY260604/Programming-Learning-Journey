/**
 * ============================================================
 * 01 - Read Write Text File Sync.js
 * ============================================================
 *
 * Goal:
 * - Understand fs module
 * - Learn synchronous file read/write
 * - Understand blocking behavior
 *
 * Run:
 * node "01 - Read Write Text File Sync.js"
 *
 * ============================================================
 */

const fs = require("fs");
const path = require("path");

console.log("===== 1️⃣ Writing File (Sync) =====");

/**
 * Always build safe path using __dirname
 */
const filePath = path.join(__dirname, "sample.txt");

/**
 * writeFileSync:
 * - Creates file if not exists
 * - Overwrites if exists
 * - BLOCKING operation
 */

fs.writeFileSync(filePath, "Hello from Node.js\n");

console.log("File written successfully.");


console.log("\n===== 2️⃣ Reading File (Sync) =====");

/**
 * readFileSync:
 * - Blocking operation
 * - Returns Buffer unless encoding specified
 */

const content = fs.readFileSync(filePath, "utf-8");

console.log("File content:");
console.log(content);


console.log("\n===== 3️⃣ Append to File (Sync) =====");

/**
 * appendFileSync:
 * - Adds content to existing file
 */

fs.appendFileSync(filePath, "Appended line.\n");

const updatedContent = fs.readFileSync(filePath, "utf-8");

console.log("Updated content:");
console.log(updatedContent);


/**
 * ============================================================
 * WHAT DOES "SYNC" MEAN?
 * ============================================================
 *
 * Sync = Blocking
 *
 * Node will:
 * 1. Stop everything
 * 2. Finish file operation
 * 3. Continue execution
 *
 * This is BAD for production servers.
 *
 * Why?
 * Because while reading file,
 * server cannot handle other requests.
 *
 * ============================================================
 * BACKEND WARNING
 * ============================================================
 *
 * ✔ Sync methods are OK for:
 *   - Startup config loading
 *   - Small scripts
 *
 * ❌ Avoid sync in real web servers
 *
 * Next lesson:
 * We will learn ASYNC version.
 *
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ fs.writeFileSync()
 * ✔ fs.readFileSync()
 * ✔ fs.appendFileSync()
 * ✔ Sync blocks the event loop
 *
 * ============================================================
 */