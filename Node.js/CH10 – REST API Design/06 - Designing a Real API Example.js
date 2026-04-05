/**
 * ============================================================
 * 06 - Designing a Real API Example.js
 * ============================================================
 *
 * Goal:
 * - Design a REST API for a real application
 * - Understand resource-based API structure
 *
 * Run:
 * node "06 - Designing a Real API Example.js"
 *
 * ============================================================
 */

console.log("===== Designing a Real REST API =====");


/**
 * ============================================================
 * Example Application: Online Store
 * ============================================================
 *
 * Resources in this system:
 *
 * users
 * products
 * orders
 * reviews
 */

console.log("\nResources:");

const resources = [
    "users",
    "products",
    "orders",
    "reviews"
];

resources.forEach(resource => console.log(resource));


/**
 * ============================================================
 * User API
 * ============================================================
 */

console.log("\n===== User API =====");

const userAPI = [
    "GET    /users",
    "GET    /users/:id",
    "POST   /users",
    "PUT    /users/:id",
    "DELETE /users/:id"
];

userAPI.forEach(endpoint => console.log(endpoint));


/**
 * ============================================================
 * Product API
 * ============================================================
 */

console.log("\n===== Product API =====");

const productAPI = [
    "GET    /products",
    "GET    /products/:id",
    "POST   /products",
    "PUT    /products/:id",
    "DELETE /products/:id"
];

productAPI.forEach(endpoint => console.log(endpoint));


/**
 * ============================================================
 * Order API
 * ============================================================
 */

console.log("\n===== Order API =====");

const orderAPI = [
    "GET    /orders",
    "GET    /orders/:id",
    "POST   /orders",
    "PUT    /orders/:id",
    "DELETE /orders/:id"
];

orderAPI.forEach(endpoint => console.log(endpoint));


/**
 * ============================================================
 * Nested Resource Examples
 * ============================================================
 */

console.log("\n===== Nested Resources =====");

const nestedExamples = [
    "GET /users/:id/orders",
    "GET /products/:id/reviews",
    "POST /orders/:id/items"
];

nestedExamples.forEach(endpoint => console.log(endpoint));


/**
 * ============================================================
 * Example API Usage
 * ============================================================
 */

console.log("\n===== Example Request Flow =====");

const exampleFlow = [
    "Client → GET /products",
    "Server → returns product list",
    "",
    "Client → POST /orders",
    "Server → creates new order",
    "",
    "Client → GET /users/1/orders",
    "Server → returns user's orders"
];

exampleFlow.forEach(line => console.log(line));


/**
 * ============================================================
 * Typical Backend API Structure
 * ============================================================
 */

console.log("\n===== Backend API Structure =====");

const backendStructure = `
/users
/products
/orders
/reviews
`;

console.log(backendStructure);


/**
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ APIs should be resource-based
 * ✔ Use HTTP methods for operations
 * ✔ Keep structure consistent
 * ✔ Use nested routes for relationships
 *
 * ============================================================
 */