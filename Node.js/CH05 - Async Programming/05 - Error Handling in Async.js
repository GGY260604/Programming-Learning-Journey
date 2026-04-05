/**
 * ============================================================
 * 05 - Error Handling in Async.js
 * ============================================================
 *
 * Goal:
 * - Understand async error propagation
 * - Handle errors properly in async functions
 * - Prepare for backend error handling
 *
 * Run:
 * node "05 - Error Handling in Async.js"
 *
 * ============================================================
 */

console.log("===== 1️⃣ Promise Error =====");

function failingPromise() {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            reject(new Error("Something went wrong"));
        }, 1000);
    });
}

/**
 * Handling with .catch()
 */

failingPromise()
    .catch(error => {
        console.log("Caught with .catch():", error.message);
    });


/**
 * ============================================================
 * 2️⃣ Async/Await Error Handling
 * ============================================================
 */

async function asyncErrorExample() {

    try {

        const result = await failingPromise();

        console.log(result);

    } catch (error) {

        console.log("Caught with try/catch:", error.message);

    }

}

setTimeout(asyncErrorExample, 1500);


/**
 * ============================================================
 * 3️⃣ Error Propagation
 * ============================================================
 *
 * Errors can propagate upward.
 */

async function serviceLayer() {

    const data = await failingPromise();

    return data;
}

async function controllerLayer() {

    try {

        const result = await serviceLayer();

        console.log(result);

    } catch (error) {

        console.log("Controller handled error:", error.message);

    }

}

setTimeout(controllerLayer, 3000);


/**
 * ============================================================
 * 4️⃣ Backend Style Example
 * ============================================================
 */

async function getUserFromDB(userId) {

    if (!userId) {
        throw new Error("User ID required");
    }

    return { id: userId, name: "Alice" };
}

async function apiHandler() {

    try {

        const user = await getUserFromDB();

        console.log(user);

    } catch (error) {

        console.log("API error:", error.message);

    }

}

setTimeout(apiHandler, 4500);


/**
 * ============================================================
 * 5️⃣ Global Unhandled Error Listener
 * ============================================================
 *
 * Node allows catching unhandled promise errors.
 */

process.on("unhandledRejection", (error) => {

    console.log("Unhandled promise rejection:", error.message);

});

async function triggerUnhandled() {

    await failingPromise(); // no try/catch

}

setTimeout(triggerUnhandled, 6000);


/**
 * ============================================================
 * WHY THIS MATTERS IN BACKEND
 * ============================================================
 *
 * Real Express code:
 *
 * app.get("/user", async (req, res) => {
 *
 *     try {
 *
 *         const user = await db.getUser();
 *
 *         res.json(user);
 *
 *     } catch (error) {
 *
 *         res.status(500).json({
 *             error: error.message
 *         });
 *
 *     }
 *
 * });
 *
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ Use try/catch with async/await
 * ✔ Errors propagate up the call stack
 * ✔ Handle errors at controller layer
 * ✔ Prevent unhandled promise rejection
 *
 * ============================================================
 */