/**
 * ============================================================
 * 05 - Good vs Bad API Design.js
 * ============================================================
 *
 * Goal:
 * - Compare bad API design with good REST API design
 * - Understand common beginner mistakes
 *
 * Run:
 * node "05 - Good vs Bad API Design.js"
 *
 * ============================================================
 */

console.log("===== Good vs Bad API Design =====");


/**
 * ============================================================
 * 1️⃣ Using Verbs in URL
 * ============================================================
 */

console.log("\nBad API (using verbs in URLs):");

const badVerbAPI = [
    "GET /getUsers",
    "POST /createUser",
    "POST /deleteUser",
    "POST /updateUser"
];

badVerbAPI.forEach(route => console.log(route));


console.log("\nGood REST API:");

const goodVerbAPI = [
    "GET    /users",
    "POST   /users",
    "PUT    /users/1",
    "DELETE /users/1"
];

goodVerbAPI.forEach(route => console.log(route));


/**
 * Why?
 *
 * HTTP methods already describe the action.
 */


/**
 * ============================================================
 * 2️⃣ Inconsistent Naming
 * ============================================================
 */

console.log("\nBad API (inconsistent naming):");

const inconsistentAPI = [
    "/userList",
    "/product-list",
    "/orders_data"
];

inconsistentAPI.forEach(route => console.log(route));


console.log("\nGood API (consistent naming):");

const consistentAPI = [
    "/users",
    "/products",
    "/orders"
];

consistentAPI.forEach(route => console.log(route));


/**
 * ============================================================
 * 3️⃣ Deeply Nested APIs
 * ============================================================
 */

console.log("\nBad API (too deeply nested):");

const deepAPI = "/users/1/orders/2/products/3/reviews/5";

console.log(deepAPI);


console.log("\nBetter API:");

const betterAPI = [
    "/users/1/orders",
    "/orders/2/products"
];

betterAPI.forEach(route => console.log(route));


/**
 * ============================================================
 * 4️⃣ Using Query Parameters Incorrectly
 * ============================================================
 */

console.log("\nBad API:");

const badQuery = "/getUser?id=1";

console.log(badQuery);


console.log("\nBetter API:");

const goodQuery = "/users/1";

console.log(goodQuery);


/**
 * ============================================================
 * 5️⃣ Proper REST API Example
 * ============================================================
 */

console.log("\nExample of good REST API:");

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
 * ✔ Keep naming consistent
 * ✔ Avoid overly deep URLs
 * ✔ Use HTTP methods correctly
 * ✔ Follow predictable structure
 *
 * ============================================================
 */