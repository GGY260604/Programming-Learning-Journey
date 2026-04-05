/**
 * ============================================================
 * 02 - Destructuring and Template Strings.js
 * ============================================================
 *
 * Goal:
 * - Understand object destructuring
 * - Understand array destructuring
 * - Understand template literals
 *
 * These are EXTREMELY common in backend code.
 *
 * Run:
 * node "02 - Destructuring and Template Strings.js"
 * ============================================================
 */


console.log("===== OBJECT DESTRUCTURING =====");

const user = {
    id: 1,
    name: "Alice",
    email: "alice@email.com",
    role: "admin"
};

// Old way
const userNameOld = user.name;
console.log("Old way:", userNameOld);

// Modern way (destructuring)
const { name, email } = user;
console.log("Destructured name:", name);
console.log("Destructured email:", email);


/**
 * Why this is important in backend:
 *
 * In Express:
 * const { email, password } = req.body;
 *
 * Instead of:
 * const email = req.body.email;
 * const password = req.body.password;
 */


console.log("\n===== RENAME DURING DESTRUCTURING =====");

const { role: userRole } = user;
console.log("Renamed role → userRole:", userRole);


/**
 * role is renamed to userRole
 * Very useful when variable name conflicts
 */


console.log("\n===== DEFAULT VALUE =====");

const product = {
    title: "Laptop"
};

const { title, price = 0 } = product;
console.log("Title:", title);
console.log("Price (defaulted):", price);


/**
 * If price does not exist,
 * default value is used.
 */


console.log("\n===== ARRAY DESTRUCTURING =====");

const numbers = [10, 20, 30];

const [first, second] = numbers;
console.log("First:", first);
console.log("Second:", second);


/**
 * Common in backend:
 * const [rows] = await db.query(...)
 */


console.log("\n===== TEMPLATE LITERALS =====");

// Old way
const greetingOld = "Hello " + name + ", your email is " + email;
console.log("Old way:", greetingOld);

// Modern way
const greeting = `Hello ${name}, your email is ${email}`;
console.log("Template literal:", greeting);


/**
 * Template literals:
 * - Use backticks `
 * - Allow ${variable}
 * - Allow multi-line string
 */


console.log("\n===== MULTI-LINE STRING =====");

const message = `
User Info:
Name: ${name}
Email: ${email}
Role: ${userRole}
`;

console.log(message);


/**
 * ================================
 * BACKEND STYLE EXAMPLE
 * ================================
 */

console.log("===== BACKEND SIMULATION =====");

function createUserResponse(userObject) {
    const { id, name, role } = userObject;

    return {
        message: `User ${name} created successfully`,
        data: {
            id,
            role
        }
    };
}

const response = createUserResponse(user);
console.log(response);


/**
 * This pattern is extremely common in:
 * - API response shaping
 * - Database result extraction
 * - Authentication payload handling
 *
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ Destructure objects for clean code
 * ✔ Use default values when necessary
 * ✔ Rename variables if needed
 * ✔ Always use template literals instead of string +
 *
 * Backend code heavily depends on this syntax.
 * ============================================================
 */