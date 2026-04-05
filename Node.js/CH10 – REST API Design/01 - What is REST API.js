/**
 * ============================================================
 * 01 - What is REST API.js
 * ============================================================
 *
 * Goal:
 * - Understand what REST API means
 * - Learn how frontend and backend communicate
 * - Understand resources in REST design
 *
 * Run:
 * node "01 - What is REST API.js"
 *
 * ============================================================
 */

console.log("===== What is REST API =====");

/**
 * REST stands for:
 *
 * Representational State Transfer
 *
 * It is a design style for building APIs.
 *
 * REST APIs allow frontend and backend
 * to communicate through HTTP requests.
 */

console.log("REST = Representational State Transfer");


/**
 * ============================================================
 * Frontend ↔ Backend Communication
 * ============================================================
 */

console.log("\n===== Client Server Communication =====");

/**
 * Example:
 *
 * Frontend requests user data
 */

const exampleRequest = `
GET /users
`;

console.log("Frontend Request:");
console.log(exampleRequest);


/**
 * Backend responds with data
 */

const exampleResponse = `
[
  { "id": 1, "name": "Alice" },
  { "id": 2, "name": "Bob" }
]
`;

console.log("\nBackend Response:");
console.log(exampleResponse);


/**
 * ============================================================
 * REST Resource Concept
 * ============================================================
 */

console.log("\n===== REST Resources =====");

/**
 * REST APIs are organized around resources.
 *
 * Examples:
 *
 * users
 * products
 * orders
 * posts
 */

const resources = [
    "users",
    "products",
    "orders",
    "posts"
];

console.log("Example resources:", resources);


/**
 * ============================================================
 * REST Endpoint Examples
 * ============================================================
 */

console.log("\n===== Example REST Endpoints =====");

const endpoints = [
    "GET /users",
    "GET /users/1",
    "POST /users",
    "PUT /users/1",
    "DELETE /users/1"
];

endpoints.forEach(endpoint => console.log(endpoint));


/**
 * These endpoints represent operations on the
 * 'users' resource.
 */


/**
 * ============================================================
 * REST Design Philosophy
 * ============================================================
 *
 * REST APIs should be:
 *
 * ✔ Resource based
 * ✔ Predictable
 * ✔ Stateless
 * ✔ Consistent
 *
 */

console.log("\nREST design should be predictable and consistent.");


/**
 * ============================================================
 * Stateless Concept
 * ============================================================
 *
 * REST APIs are stateless.
 *
 * That means:
 * Each request contains all required information.
 *
 * The server does not remember previous requests.
 */

console.log("\nREST APIs are stateless.");


/**
 * ============================================================
 * Example Stateless Requests
 * ============================================================
 */

console.log("\nExample requests:");

console.log("GET /users");
console.log("GET /users/5");
console.log("DELETE /users/3");


/**
 * Each request is independent.
 */


/**
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ REST is an API design style
 * ✔ APIs represent resources
 * ✔ Use HTTP methods to operate resources
 * ✔ REST APIs are stateless
 *
 * ============================================================
 */