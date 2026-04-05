/**
 * ============================================================
 * 02 - async await Basics.js
 * ============================================================
 *
 * Goal:
 * - Understand async / await
 * - Convert Promise chains into clean syntax
 * - Learn proper error handling
 *
 * Run:
 * node "02 - async await Basics.js"
 *
 * ============================================================
 */

console.log("===== 1️⃣ Basic Promise =====");

function fetchUser() {
    return new Promise((resolve) => {
        setTimeout(() => {
            resolve({ id: 1, name: "Alice" });
        }, 1000);
    });
}

/**
 * Using Promise .then()
 */

fetchUser().then((user) => {
    console.log("User (Promise):", user);
});


/**
 * ============================================================
 * 2️⃣ async / await
 * ============================================================
 *
 * async:
 * Marks function as asynchronous.
 *
 * await:
 * Waits for Promise to resolve.
 */

async function getUser() {

    const user = await fetchUser();

    console.log("User (await):", user);
}

getUser();


/**
 * ============================================================
 * 3️⃣ Multiple Async Steps
 * ============================================================
 */

function getOrders(userId) {
    return new Promise((resolve) => {
        setTimeout(() => {
            resolve(["Order1", "Order2"]);
        }, 1000);
    });
}

function getPayment(order) {
    return new Promise((resolve) => {
        setTimeout(() => {
            resolve("Payment Complete");
        }, 1000);
    });
}

async function backendFlow() {

    const user = await fetchUser();
    console.log("User:", user);

    const orders = await getOrders(user.id);
    console.log("Orders:", orders);

    const payment = await getPayment(orders[0]);
    console.log("Payment:", payment);
}

backendFlow();


/**
 * Compare with Promise chain:
 *
 * fetchUser()
 *  .then(user => getOrders(user.id))
 *  .then(orders => getPayment(orders[0]))
 *
 * async/await is much easier to read.
 */


/**
 * ============================================================
 * 4️⃣ Error Handling with async/await
 * ============================================================
 */

function riskyOperation() {
    return new Promise((resolve, reject) => {

        const success = false;

        setTimeout(() => {

            if (success) {
                resolve("Operation succeeded");
            } else {
                reject(new Error("Operation failed"));
            }

        }, 1000);
    });
}

async function runRiskyTask() {

    try {

        const result = await riskyOperation();
        console.log(result);

    } catch (error) {

        console.log("Caught error:", error.message);

    }

}

runRiskyTask();


/**
 * ============================================================
 * VERY IMPORTANT RULE
 * ============================================================
 *
 * await only works inside async function.
 *
 * Example:
 *
 * ❌ const data = await fetchUser();
 *
 * ✔ async function run() {
 *       const data = await fetchUser();
 *   }
 *
 * ============================================================
 * BACKEND STYLE EXAMPLE
 * ============================================================
 *
 * Express route:
 *
 * app.get("/users", async (req, res) => {
 *
 *     const users = await db.getUsers();
 *
 *     res.json(users);
 *
 * });
 *
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ async marks function asynchronous
 * ✔ await pauses until Promise resolves
 * ✔ try/catch handles async errors
 * ✔ async/await makes backend code readable
 *
 * ============================================================
 */