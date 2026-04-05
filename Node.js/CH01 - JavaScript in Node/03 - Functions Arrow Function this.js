/**
 * ============================================================
 * 03 - Functions Arrow Function this.js
 * ============================================================
 *
 * Goal:
 * - Understand normal functions
 * - Understand arrow functions
 * - Understand how `this` works
 * - Know which one to use in backend
 *
 * Run:
 * node "03 - Functions Arrow Function this.js"
 * ============================================================
 */


console.log("===== 1️⃣ NORMAL FUNCTION =====");

function add(a, b) {
    return a + b;
}

console.log("add(2,3):", add(2, 3));


/**
 * Normal function:
 * - Has its own `this`
 * - Hoisted
 * - Used widely in traditional JS
 */


console.log("\n===== 2️⃣ FUNCTION EXPRESSION =====");

const multiply = function (a, b) {
    return a * b;
};

console.log("multiply(3,4):", multiply(3, 4));


/**
 * Function expression:
 * - Stored in variable
 * - Not hoisted like function declaration
 */


console.log("\n===== 3️⃣ ARROW FUNCTION =====");

const subtract = (a, b) => {
    return a - b;
};

console.log("subtract(10,5):", subtract(10, 5));


/**
 * Arrow function:
 * - Shorter syntax
 * - Does NOT have its own `this`
 */


console.log("\n===== 4️⃣ SHORT ARROW FUNCTION =====");

const square = n => n * n;

console.log("square(6):", square(6));


/**
 * If only one line return,
 * no need {} and no need return keyword.
 */


console.log("\n===== 5️⃣ UNDERSTANDING `this` =====");

const user = {
    name: "Alice",

    normalFunction: function () {
        console.log("Normal function this.name:", this.name);
    },

    arrowFunction: () => {
        console.log("Arrow function this.name:", this.name);
    }
};

user.normalFunction(); // ✅ works
user.arrowFunction();  // ❌ undefined


/**
 * WHY?
 *
 * Normal function:
 * - `this` refers to the object that calls it
 *
 * Arrow function:
 * - Does NOT bind its own `this`
 * - In Node, `this` is NOT the object
 */


console.log("\n===== 6️⃣ BACKEND STYLE EXAMPLE =====");

/**
 * In Express, we often write:
 *
 * app.get("/users", (req, res) => {
 *     res.json({ message: "Hello" });
 * });
 *
 * Arrow functions are perfect for:
 * - Route handlers
 * - Small callbacks
 * - Promise chains
 */


const fakeRequestHandler = (req, res) => {
    return {
        status: 200,
        message: `Hello ${req.user}`
    };
};

const result = fakeRequestHandler({ user: "Alice" });
console.log(result);


/**
 * ============================================================
 * 7️⃣ COMMON MISTAKE WITH `this`
 * ============================================================
 */

console.log("\n===== COMMON MISTAKE =====");

function Counter() {
    this.count = 0;

    setTimeout(function () {
        // Here `this` is NOT Counter
        console.log("Normal function inside setTimeout:", this.count);
    }, 100);

    setTimeout(() => {
        // Arrow function inherits `this`
        console.log("Arrow function inside setTimeout:", this.count);
    }, 200);
}

new Counter();


/**
 * IMPORTANT BACKEND LESSON:
 *
 * Use arrow functions when:
 * - Writing callbacks
 * - Writing route handlers
 * - Writing Promise logic
 *
 * Use normal function when:
 * - You NEED dynamic `this`
 * - Writing object methods carefully
 *
 * In modern Node backend:
 * ✔ Arrow functions are most common
 *
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * 1. Arrow functions are shorter
 * 2. Arrow functions do NOT bind their own `this`
 * 3. Most backend handlers use arrow functions
 * 4. Be careful when using `this` in async callbacks
 *
 * ============================================================
 */