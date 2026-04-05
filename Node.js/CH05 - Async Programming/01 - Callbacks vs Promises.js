/**
 * ============================================================
 * 01 - Callbacks vs Promises.js
 * ============================================================
 *
 * Goal:
 * - Understand asynchronous behavior
 * - Understand callbacks
 * - Understand callback hell
 * - Understand promises
 *
 * Run:
 * node "01 - Callbacks vs Promises.js"
 *
 * ============================================================
 */

console.log("===== 1️⃣ Asynchronous Behavior =====");

/**
 * setTimeout simulates async operation
 */

setTimeout(() => {
    console.log("Async task finished");
}, 2000);

console.log("This runs first");


/**
 * Output order:
 *
 * This runs first
 * Async task finished
 *
 * Because setTimeout is asynchronous.
 */


console.log("\n===== 2️⃣ Callback Example =====");

function fetchUser(callback) {
    setTimeout(() => {
        const user = { id: 1, name: "Alice" };
        callback(user);
    }, 1000);
}

fetchUser((user) => {
    console.log("User received:", user);
});


/**
 * Callback:
 * A function passed into another function
 * to run after task completes.
 */


console.log("\n===== 3️⃣ Callback Hell Example =====");

function getUser(callback) {
    setTimeout(() => {
        callback({ id: 1, name: "Alice" });
    }, 1000);
}

function getOrders(userId, callback) {
    setTimeout(() => {
        callback(["Order1", "Order2"]);
    }, 1000);
}

function getPayment(order, callback) {
    setTimeout(() => {
        callback("Payment Complete");
    }, 1000);
}

getUser((user) => {
    console.log("User:", user);

    getOrders(user.id, (orders) => {
        console.log("Orders:", orders);

        getPayment(orders[0], (payment) => {
            console.log("Payment:", payment);
        });
    });
});


/**
 * This nested structure is called:
 *
 * ⚠ CALLBACK HELL
 *
 * Hard to read
 * Hard to debug
 */


console.log("\n===== 4️⃣ Promise Example =====");

/**
 * Promise represents future value
 */

function fetchUserPromise() {
    return new Promise((resolve, reject) => {

        setTimeout(() => {
            const user = { id: 2, name: "Bob" };

            resolve(user); // success
        }, 1000);

    });
}

fetchUserPromise()
    .then((user) => {
        console.log("Promise user:", user);
    })
    .catch((error) => {
        console.log("Error:", error);
    });


/**
 * Promise states:
 *
 * pending
 * fulfilled
 * rejected
 */


console.log("\n===== 5️⃣ Promise Chain Example =====");

function getUserP() {
    return new Promise((resolve) => {
        setTimeout(() => resolve({ id: 10, name: "Alice" }), 1000);
    });
}

function getOrdersP(userId) {
    return new Promise((resolve) => {
        setTimeout(() => resolve(["OrderA", "OrderB"]), 1000);
    });
}

function getPaymentP(order) {
    return new Promise((resolve) => {
        setTimeout(() => resolve("Payment Successful"), 1000);
    });
}

getUserP()
    .then((user) => {
        console.log("User:", user);
        return getOrdersP(user.id);
    })
    .then((orders) => {
        console.log("Orders:", orders);
        return getPaymentP(orders[0]);
    })
    .then((payment) => {
        console.log("Payment:", payment);
    })
    .catch((error) => {
        console.log("Error:", error);
    });


/**
 * ============================================================
 * WHY PROMISES ARE BETTER
 * ============================================================
 *
 * ✔ Avoid nested callbacks
 * ✔ Easier error handling
 * ✔ Chain operations cleanly
 *
 * But promises can still become messy.
 *
 * Next lesson:
 * async / await (modern solution)
 *
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ Callback = function executed later
 * ✔ Nested callbacks cause callback hell
 * ✔ Promise represents future result
 * ✔ Promise chains simplify async flow
 *
 * ============================================================
 */