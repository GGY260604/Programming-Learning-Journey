/**
 * ============================================================
 * 04 - Arrays Objects Useful Methods.js
 * ============================================================
 *
 * Goal:
 * Master important array/object methods used in backend:
 * - map
 * - filter
 * - find
 * - reduce
 * - some
 * - includes
 *
 * Run:
 * node "04 - Arrays Objects Useful Methods.js"
 * ============================================================
 */

console.log("===== SAMPLE DATA =====");

const users = [
    { id: 1, name: "Alice", role: "admin", active: true },
    { id: 2, name: "Bob", role: "user", active: false },
    { id: 3, name: "Charlie", role: "user", active: true },
];

console.log(users);


/**
 * ============================================================
 * 1️⃣ map()
 * ============================================================
 * Transform each item into something else.
 */

console.log("\n===== map() =====");

const userNames = users.map(user => user.name);

console.log("User names:", userNames);


/**
 * Backend usage:
 * - Remove sensitive fields
 * - Format API response
 */


/**
 * ============================================================
 * 2️⃣ filter()
 * ============================================================
 * Return items that match condition.
 */

console.log("\n===== filter() =====");

const activeUsers = users.filter(user => user.active);

console.log("Active users:", activeUsers);


/**
 * Backend usage:
 * - Filter by role
 * - Filter by status
 * - Search feature
 */


/**
 * ============================================================
 * 3️⃣ find()
 * ============================================================
 * Return FIRST match.
 */

console.log("\n===== find() =====");

const foundUser = users.find(user => user.id === 2);

console.log("Found user:", foundUser);


/**
 * Backend usage:
 * - Find user by ID
 * - Find product by ID
 */


/**
 * ============================================================
 * 4️⃣ some()
 * ============================================================
 * Returns true if ANY match.
 */

console.log("\n===== some() =====");

const hasAdmin = users.some(user => user.role === "admin");

console.log("Has admin:", hasAdmin);


/**
 * Backend usage:
 * - Permission checking
 * - Role validation
 */


/**
 * ============================================================
 * 5️⃣ includes()
 * ============================================================
 */

console.log("\n===== includes() =====");

const roles = ["admin", "user"];

console.log("Includes 'admin':", roles.includes("admin"));
console.log("Includes 'guest':", roles.includes("guest"));


/**
 * Backend usage:
 * - Validate allowed roles
 * - Validate input options
 */


/**
 * ============================================================
 * 6️⃣ reduce()
 * ============================================================
 * Combine array into single value.
 */

console.log("\n===== reduce() =====");

const numbers = [10, 20, 30];

const total = numbers.reduce((acc, current) => {
    return acc + current;
}, 0);

console.log("Total:", total);


/**
 * Backend usage:
 * - Calculate totals
 * - Aggregate results
 * - Build grouped objects
 */


/**
 * ============================================================
 * 7️⃣ REAL BACKEND STYLE EXAMPLE
 * ============================================================
 */

console.log("\n===== BACKEND SIMULATION =====");

/**
 * Suppose we want to:
 * - Return only active users
 * - Remove role field
 */

const apiResponse = users
    .filter(user => user.active)
    .map(user => ({
        id: user.id,
        name: user.name
    }));

console.log("API Response:", apiResponse);


/**
 * This pattern is EXTREMELY common in:
 * - REST API building
 * - Controller logic
 * - Data transformation
 *
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ map → transform
 * ✔ filter → condition
 * ✔ find → single match
 * ✔ some → boolean check
 * ✔ includes → simple validation
 * ✔ reduce → aggregation
 *
 * Master these and backend data logic becomes EASY.
 * ============================================================
 */