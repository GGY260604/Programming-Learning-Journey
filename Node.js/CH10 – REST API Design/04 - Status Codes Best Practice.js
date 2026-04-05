/**
 * ============================================================
 * 04 - Status Codes Best Practice.js
 * ============================================================
 *
 * Goal:
 * - Understand HTTP status codes
 * - Learn which status codes to use in APIs
 *
 * Run:
 * node "04 - Status Codes Best Practice.js"
 *
 * ============================================================
 */

console.log("===== HTTP Status Codes =====");


/**
 * ============================================================
 * 1️⃣ Success Codes (2xx)
 * ============================================================
 */

console.log("\n===== Success Codes =====");

const successCodes = [
    "200 OK → Request successful",
    "201 Created → Resource created",
    "204 No Content → Success but no response body"
];

successCodes.forEach(code => console.log(code));


/**
 * Example:
 *
 * POST /users
 * → 201 Created
 */


/**
 * ============================================================
 * 2️⃣ Client Error Codes (4xx)
 * ============================================================
 */

console.log("\n===== Client Error Codes =====");

const clientErrors = [
    "400 Bad Request → Invalid input",
    "401 Unauthorized → Not authenticated",
    "403 Forbidden → No permission",
    "404 Not Found → Resource not found"
];

clientErrors.forEach(code => console.log(code));


/**
 * Example:
 *
 * GET /users/999
 * → 404 Not Found
 */


/**
 * ============================================================
 * 3️⃣ Server Error Codes (5xx)
 * ============================================================
 */

console.log("\n===== Server Error Codes =====");

const serverErrors = [
    "500 Internal Server Error → Server crash",
    "502 Bad Gateway → Upstream server error",
    "503 Service Unavailable → Server overloaded"
];

serverErrors.forEach(code => console.log(code));


/**
 * ============================================================
 * Example API Responses
 * ============================================================
 */

console.log("\n===== Example API Responses =====");


const successResponse = {
    status: 200,
    body: {
        success: true,
        data: { id: 1, name: "Alice" }
    }
};

console.log("\n200 OK Example:");
console.log(successResponse);


const errorResponse = {
    status: 404,
    body: {
        success: false,
        message: "User not found"
    }
};

console.log("\n404 Not Found Example:");
console.log(errorResponse);


/**
 * ============================================================
 * Express Example
 * ============================================================
 */

console.log("\n===== Express Example =====");

const expressExample = `
res.status(404).json({
  success: false,
  message: "User not found"
});
`;

console.log(expressExample);


/**
 * ============================================================
 * Common API Status Code Usage
 * ============================================================
 */

console.log("\n===== Typical REST API Status Codes =====");

const typicalUsage = [
    "GET /users       → 200",
    "GET /users/1     → 200 or 404",
    "POST /users      → 201",
    "PUT /users/1     → 200",
    "DELETE /users/1  → 204"
];

typicalUsage.forEach(example => console.log(example));


/**
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ 200 → successful request
 * ✔ 201 → resource created
 * ✔ 400 → bad request from client
 * ✔ 404 → resource not found
 * ✔ 500 → server error
 *
 * ============================================================
 */