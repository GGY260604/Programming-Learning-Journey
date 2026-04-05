/**
 * ============================================================
 * 02 - Read Write Text File Async.js
 * ============================================================
 *
 * Goal:
 * - Learn async file operations
 * - Understand non-blocking behavior
 * - Compare with sync version
 *
 * Run:
 * node "02 - Read Write Text File Async.js"
 *
 * ============================================================
 */

const fs = require("fs");
const path = require("path");

const filePath = path.join(__dirname, "async-sample.txt");

console.log("===== 1️⃣ Writing File (Async) =====");

/**
 * writeFile (async version)
 * - Non-blocking
 * - Uses callback
 */

fs.writeFile(filePath, "Hello Async World\n", (err) => {
    if (err) {
        console.log("Write error:", err.message);
        return;
    }

    console.log("File written successfully (async).");

    console.log("\n===== 2️⃣ Reading File (Async) =====");

    fs.readFile(filePath, "utf-8", (err, data) => {
        if (err) {
            console.log("Read error:", err.message);
            return;
        }

        console.log("File content:");
        console.log(data);

        console.log("\n===== 3️⃣ Append File (Async) =====");

        fs.appendFile(filePath, "Another async line\n", (err) => {
            if (err) {
                console.log("Append error:", err.message);
                return;
            }

            console.log("Append successful.");

            fs.readFile(filePath, "utf-8", (err, updatedData) => {
                if (err) {
                    console.log("Final read error:", err.message);
                    return;
                }

                console.log("Updated content:");
                console.log(updatedData);
            });
        });
    });
});

console.log("This line runs BEFORE async operations finish.");


/**
 * ============================================================
 * WHAT JUST HAPPENED?
 * ============================================================
 *
 * Async operations:
 * - Do NOT block the event loop
 * - Allow Node to handle other tasks
 *
 * Notice:
 * "This line runs BEFORE async operations finish."
 *
 * That proves:
 * Non-blocking execution.
 *
 * ============================================================
 * PROBLEM: CALLBACK HELL
 * ============================================================
 *
 * Nested callbacks become messy:
 *
 * fs.writeFile(...)
 *   -> fs.readFile(...)
 *      -> fs.appendFile(...)
 *         -> fs.readFile(...)
 *
 * Hard to read.
 *
 * Next lesson:
 * We will fix this using Promises & async/await.
 *
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ fs.writeFile() is async
 * ✔ fs.readFile() is async
 * ✔ Async does NOT block server
 * ✔ Callbacks can become messy
 *
 * ============================================================
 */