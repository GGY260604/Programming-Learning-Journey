/**
 * ============================================================
 * 01 - What is Authentication.js
 * ============================================================
 *
 * Goal:
 * - Understand what authentication is
 * - Understand login systems
 * - Understand why APIs need authentication
 *
 * Run:
 * node "01 - What is Authentication.js"
 *
 * ============================================================
 */

console.log("===== What is Authentication =====");

/**
 * Authentication answers the question:
 *
 * WHO ARE YOU?
 *
 * It verifies the identity of a user.
 */

console.log("\nAuthentication verifies user identity.");


/**
 * ============================================================
 * Example: Login System
 * ============================================================
 */

console.log("\n===== Login Example =====");

const loginRequest = {
    email: "alice@example.com",
    password: "mypassword"
};

console.log("Client sends login request:");
console.log(loginRequest);


/**
 * Backend checks if the credentials are valid.
 */

const loginResponse = {
    success: true,
    message: "Login successful",
    userId: 1
};

console.log("\nServer response:");
console.log(loginResponse);


/**
 * ============================================================
 * Why Authentication is Important
 * ============================================================
 */

console.log("\n===== Why Authentication Matters =====");

const reasons = [
    "Protect user accounts",
    "Prevent unauthorized access",
    "Identify the current user",
    "Secure private data"
];

reasons.forEach(reason => console.log(reason));


/**
 * ============================================================
 * Authentication vs Authorization
 * ============================================================
 */

console.log("\n===== Authentication vs Authorization =====");

/**
 * Authentication → Who are you?
 * Authorization → What are you allowed to do?
 */

const example = `
User logs in → Authentication

User tries to access admin panel → Authorization
`;

console.log(example);


/**
 * ============================================================
 * Common Authentication Methods
 * ============================================================
 */

console.log("\n===== Common Authentication Methods =====");

const methods = [
    "Session-based authentication",
    "Token-based authentication",
    "JWT authentication",
    "OAuth (Google login, GitHub login)"
];

methods.forEach(method => console.log(method));


/**
 * ============================================================
 * Modern API Authentication
 * ============================================================
 */

console.log("\n===== Modern API Authentication =====");

/**
 * Most modern APIs use:
 *
 * JWT (JSON Web Token)
 *
 * Flow:
 *
 * 1. User logs in
 * 2. Server generates token
 * 3. Client stores token
 * 4. Client sends token in future requests
 */

const jwtFlow = [
    "User → login",
    "Server → generate JWT token",
    "Client → store token",
    "Client → send token in API requests"
];

jwtFlow.forEach(step => console.log(step));


/**
 * ============================================================
 * Example Protected API
 * ============================================================
 */

console.log("\nExample protected API:");

const protectedAPI = `
GET /profile
Authorization: Bearer <token>
`;

console.log(protectedAPI);


/**
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ Authentication verifies identity
 * ✔ Login systems perform authentication
 * ✔ JWT is common in modern APIs
 * ✔ Protected routes require authentication
 *
 * ============================================================
 */