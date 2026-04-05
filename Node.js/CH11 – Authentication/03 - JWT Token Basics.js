/**
 * ============================================================
 * 03 - JWT Token Basics.js
 * ============================================================
 *
 * Goal:
 * - Understand what JWT is
 * - Generate JWT tokens
 * - Verify JWT tokens
 *
 * Run:
 * node "03 - JWT Token Basics.js"
 *
 * ============================================================
 */

const jwt = require("jsonwebtoken");

console.log("===== JWT Token Basics =====");

/**
 * Secret key used to sign tokens
 * (In real apps this comes from process.env.JWT_SECRET)
 */

const SECRET_KEY = "my-secret-key";

/**
 * ============================================================
 * Generating a JWT Token
 * ============================================================
 */

console.log("\n===== Generating Token =====");

const userPayload = {
    userId: 1,
    email: "alice@example.com"
};

const token = jwt.sign(userPayload, SECRET_KEY, {
    expiresIn: "1h"
});

console.log("Generated JWT:");
console.log(token);


/**
 * ============================================================
 * Verifying a JWT Token
 * ============================================================
 */

console.log("\n===== Verifying Token =====");

try {

    const decoded = jwt.verify(token, SECRET_KEY);

    console.log("Decoded payload:");
    console.log(decoded);

} catch (error) {

    console.log("Invalid token");

}


/**
 * ============================================================
 * JWT Structure
 * ============================================================
 */

console.log("\n===== JWT Structure =====");

const structure = [
    "Header",
    "Payload",
    "Signature"
];

structure.forEach(part => console.log(part));


/**
 * Example JWT format:
 *
 * header.payload.signature
 */

console.log("\nExample token format:");

console.log("xxxxx.yyyyy.zzzzz");


/**
 * ============================================================
 * Authentication Flow with JWT
 * ============================================================
 */

console.log("\n===== JWT Authentication Flow =====");

const flow = [
    "1. User logs in",
    "2. Server verifies password",
    "3. Server generates JWT token",
    "4. Client stores token",
    "5. Client sends token in future requests"
];

flow.forEach(step => console.log(step));


/**
 * ============================================================
 * Example Protected Request
 * ============================================================
 */

console.log("\nExample request header:");

const requestHeader = `
Authorization: Bearer <token>
`;

console.log(requestHeader);


/**
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ JWT is used for authentication
 * ✔ Tokens contain encoded user information
 * ✔ Tokens must be signed with secret key
 * ✔ Server verifies token on protected routes
 *
 * ============================================================
 */