/**
 * ============================================================
 * 05 - events Module.js
 * ============================================================
 *
 * Goal:
 * - Understand EventEmitter
 * - Learn how Node uses events
 * - Understand event-driven architecture
 *
 * Run:
 * node "05 - events Module.js"
 * ============================================================
 */

const EventEmitter = require("events");

/**
 * Create a custom event emitter
 */
const emitter = new EventEmitter();

console.log("===== 1️⃣ Basic Event Listening =====");

/**
 * .on() → Listen to event
 */
emitter.on("greet", (name) => {
    console.log(`Hello ${name}`);
});

/**
 * .emit() → Trigger event
 */
emitter.emit("greet", "Alice");


/**
 * ============================================================
 * 2️⃣ Multiple Listeners
 * ============================================================
 */

console.log("\n===== Multiple Listeners =====");

emitter.on("login", (user) => {
    console.log(`User ${user} logged in`);
});

emitter.on("login", (user) => {
    console.log(`Logging activity for ${user}`);
});

emitter.emit("login", "Bob");


/**
 * One event can trigger multiple handlers.
 */


console.log("\n===== 3️⃣ Once Listener =====");

/**
 * .once() → Runs only once
 */
emitter.once("init", () => {
    console.log("System initialized");
});

emitter.emit("init");
emitter.emit("init"); // Won't run again


/**
 * ============================================================
 * 4️⃣ Backend Style Simulation
 * ============================================================
 */

console.log("\n===== Backend Simulation =====");

const backendEmitter = new EventEmitter();

/**
 * Simulate database connection
 */
backendEmitter.on("dbConnected", () => {
    console.log("Database connected successfully");
});

/**
 * Simulate server start after DB connection
 */
backendEmitter.on("serverStart", () => {
    console.log("Server is running...");
});

/**
 * Trigger flow
 */
backendEmitter.emit("dbConnected");
backendEmitter.emit("serverStart");


/**
 * ============================================================
 * WHY EVENTS MATTER IN NODE
 * ============================================================
 *
 * Node internally uses events for:
 * - HTTP requests
 * - File system
 * - Streams
 * - Network operations
 *
 * Express request flow is event-based.
 *
 * When client sends request:
 * → Node emits event
 * → Your handler runs
 *
 * This is non-blocking architecture.
 *
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ EventEmitter allows custom events
 * ✔ .on() to listen
 * ✔ .emit() to trigger
 * ✔ .once() runs only once
 * ✔ Node core is event-driven
 *
 * ============================================================
 */