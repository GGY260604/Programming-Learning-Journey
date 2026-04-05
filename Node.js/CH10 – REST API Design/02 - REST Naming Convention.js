/**
 * ============================================================
 * 02 - REST Naming Convention.js
 * ============================================================
 *
 * Goal:
 * - Learn REST endpoint naming rules
 * - Understand plural resources
 * - Understand nested resources
 *
 * Run:
 * node "02 - REST Naming Convention.js"
 *
 * ============================================================
 */

console.log("===== REST Naming Convention =====");


/**
 * ============================================================
 * 1️⃣ Use Nouns Instead of Verbs
 * ============================================================
 *
 * REST APIs represent resources (nouns),
 * not actions (verbs).
 */

console.log("\nRule 1: Use nouns, not verbs");

const badExamples = [
    "/getUsers",
    "/createUser",
    "/deleteUser"
];

const goodExamples = [
    "/users",
    "/users",
    "/users/:id"
];

console.log("\nBad API:");
badExamples.forEach(route => console.log(route));

console.log("\nGood API:");
goodExamples.forEach(route => console.log(route));


/**
 * Why?
 *
 * HTTP methods already describe the action.
 *
 * GET    /users
 * POST   /users
 * DELETE /users/1
 */


/**
 * ============================================================
 * 2️⃣ Use Plural Resource Names
 * ============================================================
 */

console.log("\nRule 2: Use plural resource names");

const pluralExamples = [
    "/users",
    "/products",
    "/orders",
    "/posts"
];

pluralExamples.forEach(route => console.log(route));


/**
 * Avoid singular names
 */

const singularExamples = [
    "/user",
    "/product",
    "/order"
];

console.log("\nAvoid singular:");
singularExamples.forEach(route => console.log(route));


/**
 * ============================================================
 * 3️⃣ Use Hierarchy for Relationships
 * ============================================================
 */

console.log("\nRule 3: Use nested resources");

const nestedExamples = [
    "/users/1/orders",
    "/users/1/posts",
    "/orders/5/items"
];

nestedExamples.forEach(route => console.log(route));


/**
 * Meaning:
 *
 * GET /users/1/orders
 * → get orders for user 1
 */


/**
 * ============================================================
 * 4️⃣ Use IDs for Specific Resources
 * ============================================================
 */

console.log("\nRule 4: Use IDs to identify resources");

const idExamples = [
    "/users/1",
    "/products/10",
    "/orders/25"
];

idExamples.forEach(route => console.log(route));


/**
 * ============================================================
 * Example REST API Design
 * ============================================================
 */

console.log("\nExample user API:");

const userAPI = [
    "GET    /users",
    "GET    /users/1",
    "POST   /users",
    "PUT    /users/1",
    "DELETE /users/1"
];

userAPI.forEach(endpoint => console.log(endpoint));


/**
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ Use nouns instead of verbs
 * ✔ Use plural resource names
 * ✔ Use nested routes for relationships
 * ✔ Use IDs to identify specific resources
 *
 * ============================================================
 */