/**
 * ============================================================
 * 04 - os Module.js
 * ============================================================
 *
 * Goal:
 * - Understand Node built-in os module
 * - Get system information
 * - Know when it is useful in backend
 *
 * Run:
 * node "04 - os Module.js"
 * ============================================================
 */

const os = require("os");

console.log("===== 1️⃣ Basic OS Info =====");

console.log("Platform:", os.platform()); // win32 / linux / darwin
console.log("Architecture:", os.arch()); // x64
console.log("CPU Cores:", os.cpus().length);
console.log("Hostname:", os.hostname());


console.log("\n===== 2️⃣ Memory Info =====");

const totalMemory = os.totalmem();
const freeMemory = os.freemem();

console.log("Total Memory (bytes):", totalMemory);
console.log("Free Memory (bytes):", freeMemory);

console.log("Free Memory (MB):", (freeMemory / 1024 / 1024).toFixed(2));


/**
 * Useful for:
 * - Monitoring
 * - Performance logging
 * - Debugging server resource usage
 */


console.log("\n===== 3️⃣ Uptime =====");

console.log("System Uptime (seconds):", os.uptime());


/**
 * ============================================================
 * BACKEND STYLE EXAMPLE
 * ============================================================
 */

console.log("\n===== BACKEND MONITOR SIMULATION =====");

function serverHealthCheck() {
    return {
        platform: os.platform(),
        cpuCores: os.cpus().length,
        freeMemoryMB: (os.freemem() / 1024 / 1024).toFixed(2),
        uptimeSeconds: os.uptime()
    };
}

console.log(serverHealthCheck());


/**
 * In real backend:
 *
 * app.get("/health", (req, res) => {
 *     res.json(serverHealthCheck());
 * });
 *
 * This helps:
 * - DevOps monitoring
 * - Cloud health checks
 * - Production diagnostics
 *
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ os.platform() → OS type
 * ✔ os.cpus() → CPU info
 * ✔ os.totalmem() / freemem() → memory
 * ✔ Useful for monitoring backend systems
 *
 * ============================================================
 */