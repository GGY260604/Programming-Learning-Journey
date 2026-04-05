/**
 * ============================================================
 * 03 - HTTP Methods Meaning.js
 * ============================================================
 *
 * Goal:
 * - Understand HTTP methods used in REST APIs
 * - Learn the difference between GET, POST, PUT, PATCH, DELETE
 *
 * Run:
 * node "03 - HTTP Methods Meaning.js"
 *
 * ============================================================
 */

console.log("===== HTTP Methods in REST API =====");


/**
 * ============================================================
 * 1️⃣ GET
 * ============================================================
 *
 * Retrieve data from server
 */

console.log("\nGET → Retrieve data");

const getExamples = [
    "GET /users",
    "GET /users/1",
    "GET /products"
];

getExamples.forEach(endpoint => console.log(endpoint));


/**
 * GET should NOT modify data.
 */


/**
 * ============================================================
 * 2️⃣ POST
 * ============================================================
 *
 * Create new resource
 */

console.log("\nPOST → Create resource");

const postExamples = [
    "POST /users",
    "POST /orders"
];

postExamples.forEach(endpoint => console.log(endpoint));


/**
 * Example request body
 */

const newUser = {
    name: "Alice"
};

console.log("\nPOST body example:", newUser);


/**
 * ============================================================
 * 3️⃣ PUT
 * ============================================================
 *
 * Replace entire resource
 */

console.log("\nPUT → Replace resource");

const putExample = "PUT /users/1";

console.log(putExample);


/**
 * Example body
 */

const updatedUser = {
    name: "Bob"
};

console.log("PUT body example:", updatedUser);


/**
 * PUT replaces the whole resource.
 */


/**
 * ============================================================
 * 4️⃣ PATCH
 * ============================================================
 *
 * Update partial resource
 */

console.log("\nPATCH → Partial update");

const patchExample = "PATCH /users/1";

console.log(patchExample);


/**
 * Example body
 */

const partialUpdate = {
    name: "Charlie"
};

console.log("PATCH body example:", partialUpdate);


/**
 * PATCH updates only specific fields.
 */


/**
 * ============================================================
 * 5️⃣ DELETE
 * ============================================================
 *
 * Remove resource
 */

console.log("\nDELETE → Remove resource");

const deleteExample = "DELETE /users/1";

console.log(deleteExample);


/**
 * ============================================================
 * Summary Table
 * ============================================================
 */

console.log("\n===== Method Summary =====");

const summary = [
    "GET    → Retrieve data",
    "POST   → Create resource",
    "PUT    → Replace resource",
    "PATCH  → Partial update",
    "DELETE → Remove resource"
];

summary.forEach(item => console.log(item));


/**
 * ============================================================
 * Example REST API
 * ============================================================
 */

console.log("\nExample User API:");

const userAPI = [
    "GET    /users",
    "GET    /users/1",
    "POST   /users",
    "PUT    /users/1",
    "PATCH  /users/1",
    "DELETE /users/1"
];

userAPI.forEach(endpoint => console.log(endpoint));


/**
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ GET retrieves data
 * ✔ POST creates new resources
 * ✔ PUT replaces entire resource
 * ✔ PATCH updates part of resource
 * ✔ DELETE removes resource
 *
 * ============================================================
 */