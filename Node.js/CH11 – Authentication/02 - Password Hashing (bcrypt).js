/**
 * ============================================================
 * 02 - Password Hashing (bcrypt).js
 * ============================================================
 *
 * Goal:
 * - Understand why passwords must be hashed
 * - Learn how bcrypt hashing works
 * - Hash and verify passwords
 *
 * Run:
 * node "02 - Password Hashing (bcrypt).js"
 *
 * ============================================================
 */

const bcrypt = require("bcrypt");

console.log("===== Password Hashing with bcrypt =====");


/**
 * ============================================================
 * Why Plain Passwords Are Dangerous
 * ============================================================
 */

console.log("\nExample of BAD password storage:");

const badDatabase = {
    email: "alice@example.com",
    password: "mypassword123"
};

console.log(badDatabase);

/**
 * If the database leaks, attackers see the password directly.
 */


/**
 * ============================================================
 * Hashing Passwords
 * ============================================================
 */

console.log("\n===== Hashing Password =====");

const password = "mypassword123";

/**
 * bcrypt.hash(password, saltRounds)
 *
 * saltRounds controls hashing complexity.
 */

const saltRounds = 10;

async function hashPassword() {

    const hashedPassword = await bcrypt.hash(password, saltRounds);

    console.log("Original password:", password);
    console.log("Hashed password:", hashedPassword);

}

hashPassword();


/**
 * ============================================================
 * Verifying Passwords
 * ============================================================
 */

async function verifyPassword() {

    const hashedPassword = await bcrypt.hash(password, saltRounds);

    const loginPassword = "mypassword123";

    const isMatch = await bcrypt.compare(loginPassword, hashedPassword);

    console.log("\nPassword verification result:", isMatch);

}

verifyPassword();

/**
 * ============================================================
 * How Login Systems Work
 * ============================================================
 */

console.log("\n===== Login Flow =====");

const loginFlow = [
    "1. User registers",
    "2. Server hashes password",
    "3. Hashed password stored in database",
    "",
    "User logs in",
    "4. Server compares password with stored hash",
    "5. If match → login success"
];

loginFlow.forEach(step => console.log(step));


/**
 * ============================================================
 * Example Database Record
 * ============================================================
 */

console.log("\nExample database record:");

const userRecord = {
    email: "alice@example.com",
    password: "$2b$10$abc123hashedpassword..."
};

console.log(userRecord);


/**
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ Never store plain passwords
 * ✔ Always hash passwords
 * ✔ bcrypt.compare() verifies password
 * ✔ Hashed passwords protect user security
 *
 * ============================================================
 */