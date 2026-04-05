/**
 * ============================================================
 * 05 - Error Handling try catch.js
 * ============================================================
 *
 * Goal:
 * - Understand what an error is
 * - Learn try...catch
 * - Learn throw new Error()
 * - Understand why backend must handle errors
 *
 * Run:
 * node "05 - Error Handling try catch.js"
 * ============================================================
 */


console.log("===== 1️⃣ BASIC ERROR =====");

try {
    const result = 10 / 0; // Not an actual error in JS (Infinity)
    console.log("Result:", result);
} catch (error) {
    console.log("Caught error:", error.message);
}


/**
 * Important:
 * Not all invalid logic throws error.
 * Some operations return special values (Infinity, NaN).
 */


console.log("\n===== 2️⃣ REAL ERROR =====");

try {
    // Accessing property of undefined
    const user = undefined;
    console.log(user.name); // ❌ TypeError
} catch (error) {
    console.log("Caught error:", error.message);
}


/**
 * try block:
 * - Code that might fail
 *
 * catch block:
 * - Handles the error safely
 */


console.log("\n===== 3️⃣ THROWING CUSTOM ERROR =====");

function divide(a, b) {
    if (b === 0) {
        throw new Error("Cannot divide by zero");
    }
    return a / b;
}

try {
    console.log(divide(10, 2));
    console.log(divide(10, 0)); // ❌ Will throw
} catch (error) {
    console.log("Custom error caught:", error.message);
}


/**
 * throw new Error("message")
 * is how backend signals something went wrong.
 */


console.log("\n===== 4️⃣ BACKEND STYLE VALIDATION =====");

function registerUser(user) {
    if (!user.email) {
        throw new Error("Email is required");
    }

    if (!user.password) {
        throw new Error("Password is required");
    }

    return "User registered successfully";
}

try {
    console.log(registerUser({ email: "test@email.com" }));
} catch (error) {
    console.log("Validation error:", error.message);
}


/**
 * In real backend:
 *
 * if (!email) {
 *    return res.status(400).json({ error: "Email required" });
 * }
 *
 * Instead of crashing the server.
 */


console.log("\n===== 5️⃣ ERROR OBJECT DETAILS =====");

try {
    JSON.parse("{ invalid json }"); // ❌ Syntax error
} catch (error) {
    console.log("Error name:", error.name);
    console.log("Error message:", error.message);
    console.log("Error stack:", error.stack);
}


/**
 * Error object has:
 * - name
 * - message
 * - stack
 *
 * stack is very important for debugging backend issues.
 */


/**
 * ============================================================
 * 6️⃣ IMPORTANT BACKEND RULE
 * ============================================================
 *
 * ❌ NEVER let your server crash
 * ✔ Always handle errors
 * ✔ Return proper response
 *
 * Later in Express, we will use:
 * - Error middleware
 * - Async error wrappers
 *
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * 1. Use try...catch for risky code
 * 2. Use throw new Error() for custom validation
 * 3. Always handle errors in backend
 * 4. Error.stack is useful for debugging
 *
 * ============================================================
 */