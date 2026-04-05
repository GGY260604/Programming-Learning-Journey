/**
 * ============================================================
 * 04 - Common Async Mistakes.js
 * ============================================================
 *
 * Goal:
 * - Understand common async mistakes
 * - Learn correct async patterns
 * - Prevent backend bugs
 *
 * Run:
 * node "04 - Common Async Mistakes.js"
 *
 * ============================================================
 */

console.log("===== 1️⃣ Forgetting await =====");

function fetchData() {
    return new Promise(resolve => {
        setTimeout(() => resolve("Data loaded"), 1000);
    });
}

async function example1() {

    const data = fetchData(); // ❌ forgot await

    console.log("Result:", data);
}

example1();

/**
 * Output:
 * Result: Promise { <pending> }
 *
 * Because we forgot await.
 */

async function example1Fixed() {

    const data = await fetchData();

    console.log("Correct Result:", data);
}

setTimeout(example1Fixed, 1500);


/**
 * ============================================================
 * 2️⃣ await inside loop (slow)
 * ============================================================
 */

function fakeAPI(id) {
    return new Promise(resolve => {
        setTimeout(() => resolve(`User ${id}`), 1000);
    });
}

async function slowLoop() {

    console.log("\n===== Slow Loop =====");

    const start = Date.now();

    for (let i = 1; i <= 3; i++) {
        const result = await fakeAPI(i);
        console.log(result);
    }

    console.log("Time:", Date.now() - start, "ms");
}

slowLoop();

/**
 * This runs sequentially:
 *
 * 1s + 1s + 1s = 3s
 */


/**
 * ============================================================
 * 3️⃣ Parallel solution
 * ============================================================
 */

async function fastLoop() {

    console.log("\n===== Fast Parallel Execution =====");

    const start = Date.now();

    const promises = [];

    for (let i = 1; i <= 3; i++) {
        promises.push(fakeAPI(i));
    }

    const results = await Promise.all(promises);

    console.log(results);

    console.log("Time:", Date.now() - start, "ms");
}

setTimeout(fastLoop, 4000);


/**
 * ============================================================
 * 4️⃣ Missing error handling
 * ============================================================
 */

function riskyTask() {
    return new Promise((resolve, reject) => {

        const success = false;

        setTimeout(() => {
            if (success) {
                resolve("Success");
            } else {
                reject(new Error("Task failed"));
            }
        }, 1000);
    });
}

async function errorExample() {

    console.log("\n===== Error Handling Example =====");

    try {

        const result = await riskyTask();

        console.log(result);

    } catch (error) {

        console.log("Handled error:", error.message);

    }

}

setTimeout(errorExample, 7000);


/**
 * ============================================================
 * 5️⃣ Unhandled Promise Rejection
 * ============================================================
 */

async function unhandledExample() {

    console.log("\n===== Unhandled Promise Example =====");

    await riskyTask(); // ❌ no try/catch
}

setTimeout(unhandledExample, 9000);


/**
 * This may crash the backend server
 * if not handled properly.
 */


/**
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ❌ Forgetting await
 * ❌ Await inside loops (slow)
 * ❌ Missing error handling
 * ❌ Unhandled promise rejection
 *
 * ✔ Always use try/catch
 * ✔ Use Promise.all for parallel tasks
 * ✔ Always await async functions
 *
 * These mistakes cause many real backend bugs.
 *
 * ============================================================
 */