/**
 * ============================================================
 * 05 - Input Validation Basics.js
 * ============================================================
 *
 * Goal:
 * - Understand why input validation is important
 * - Validate request body in Express
 * - Reject invalid data
 *
 * Run:
 * npm install express
 * node "05 - Input Validation Basics.js"
 *
 * Test:
 * POST http://localhost:3000/register
 *
 * Body example:
 * {
 *   "email": "alice@example.com",
 *   "age": 25
 * }
 *
 * ============================================================
 */

const express = require("express");

const app = express();
app.use(express.json());

const PORT = 3000;

console.log("===== Input Validation Basics =====");

/**
 * ============================================================
 * Register Route Example
 * ============================================================
 */

app.post("/register", (req, res) => {

  const { email, age } = req.body;

  /**
   * Validate email
   */
  if (!email || typeof email !== "string") {
    return res.status(400).json({
      success: false,
      message: "Email must be a string"
    });
  }

  /**
   * Validate age
   */
  if (typeof age !== "number" || age < 0) {
    return res.status(400).json({
      success: false,
      message: "Age must be a positive number"
    });
  }

  /**
   * If validation passes
   */

  res.json({
    success: true,
    message: "User registered successfully",
    data: {
      email,
      age
    }
  });

});


/**
 * ============================================================
 * Example Valid Request
 * ============================================================
 */

console.log("\nValid request example:");

const validExample = {
  email: "alice@example.com",
  age: 25
};

console.log(validExample);


/**
 * ============================================================
 * Example Invalid Requests
 * ============================================================
 */

console.log("\nInvalid request examples:");

const invalidExamples = [
  { email: 123, age: 25 },
  { email: "alice@example.com", age: "hello" },
  { email: "", age: -10 }
];

invalidExamples.forEach(example => console.log(example));


/**
 * ============================================================
 * Start Server
 * ============================================================
 */

app.listen(PORT, () => {
  console.log(`Server running at http://localhost:${PORT}`);
});


/**
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ Never trust client input
 * ✔ Validate type and value
 * ✔ Return 400 Bad Request for invalid input
 * ✔ Prevent bugs and security problems
 *
 * ============================================================
 */