/**
 * ============================================================
 * 02 - process argv env exit.js
 * ============================================================
 *
 * Goal:
 * - Understand process.argv
 * - Understand process.env
 * - Understand process.exit()
 *
 * These are critical for backend configuration.
 *
 * Run:
 * node "02 - process argv env exit.js"
 * ============================================================
 */


console.log("===== 1️⃣ process.argv =====");

/**
 * process.argv:
 * - Array of command-line arguments
 *
 * Example:
 * node file.js hello world
 *
 * argv[0] → node path
 * argv[1] → file path
 * argv[2] → first argument
 */

console.log(process.argv);

const name = process.argv[2];

if (name) {
    console.log(`Hello ${name}`);
} else {
    console.log("No name provided");
}


/**
 * Try running:
 * node "02 - process argv env exit.js" Alice
 */


console.log("\n===== 2️⃣ process.env =====");

/**
 * process.env:
 * - Stores environment variables
 * - Used for secrets & config
 *
 * NEVER hardcode:
 * - API keys
 * - Database passwords
 * - JWT secrets
 */

console.log("NODE_ENV:", process.env.NODE_ENV);
console.log("PORT:", process.env.PORT);


/**
 * Example (Windows PowerShell):
 *
 * $env:PORT=5000
 * node file.js
 *
 * Example (Mac/Linux):
 *
 * PORT=5000 node file.js
 */


console.log("\n===== 3️⃣ Simulated Backend Config =====");

const PORT = process.env.PORT || 3000;
console.log(`Server will run on port ${PORT}`);


/**
 * This is VERY common in Express:
 *
 * const PORT = process.env.PORT || 3000;
 */


console.log("\n===== 4️⃣ process.exit() =====");

/**
 * process.exit(code)
 *
 * code = 0 → success
 * code ≠ 0 → error
 */

function validateInput(input) {
    if (!input) {
        console.log("Invalid input. Exiting...");
        process.exit(1); // Exit with error
    }
}

validateInput(process.argv[2]);

console.log("Program continues...");


/**
 * ============================================================
 * IMPORTANT BACKEND CONCEPT
 * ============================================================
 *
 * In production:
 * - PORT comes from hosting provider
 * - DB URL comes from environment
 * - API keys come from environment
 *
 * NEVER push secrets to GitHub.
 *
 * Later we will use:
 * - dotenv package
 *
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ process.argv → CLI arguments
 * ✔ process.env → environment variables
 * ✔ process.exit() → stop program
 *
 * Backend configuration depends heavily on these.
 *
 * ============================================================
 */