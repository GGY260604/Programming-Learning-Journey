/**
 * ============================================================
 * 01 - JSON File Database Concept.js
 * ============================================================
 *
 * Goal:
 * - Understand why backend needs a database
 * - Simulate a simple database using JSON file
 *
 * Run:
 * node "01 - JSON File Database Concept.js"
 *
 * ============================================================
 */

console.log("===== Backend Needs Data Storage =====");

/**
 * Frontend example:
 *
 * When user registers:
 *
 * Name: Alice
 * Email: alice@gmail.com
 *
 * Backend must store this data somewhere.
 */

const users = [
    { id: 1, name: "Alice" },
    { id: 2, name: "Bob" }
];

console.log("Users stored in memory:");
console.log(users);


/**
 * Problem with in-memory storage
 */

console.log("\n===== Problem =====");

/**
 * If server restarts,
 * all data disappears.
 */

console.log("Server restart → users lost");


/**
 * Real backend solution
 */

console.log("\n===== Real Solution =====");

/**
 * Store data in database:
 *
 * SQL database:
 * - MySQL
 * - PostgreSQL
 *
 * NoSQL database:
 * - MongoDB
 *
 * For learning:
 * we will simulate database using JSON file.
 */

console.log("We will store data inside users.json file");


/**
 * Example JSON database
 */

const fakeDatabaseExample = `
[
  { "id": 1, "name": "Alice" },
  { "id": 2, "name": "Bob" }
]
`;

console.log("\nExample database file:");
console.log(fakeDatabaseExample);


/**
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ Backend must persist data
 * ✔ Memory storage is temporary
 * ✔ Database stores persistent data
 * ✔ JSON file can simulate database
 *
 * ============================================================
 */