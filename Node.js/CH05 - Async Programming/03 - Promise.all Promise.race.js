/**
 * ============================================================
 * 03 - Promise.all Promise.race.js
 * ============================================================
 *
 * Goal:
 * - Run async tasks in parallel
 * - Learn Promise.all()
 * - Learn Promise.race()
 *
 * Run:
 * node "03 - Promise.all Promise.race.js"
 *
 * ============================================================
 */

console.log("===== 1️⃣ Sequential Execution =====");

function taskA() {
    return new Promise(resolve => {
        setTimeout(() => resolve("Task A finished"), 1000);
    });
}

function taskB() {
    return new Promise(resolve => {
        setTimeout(() => resolve("Task B finished"), 1000);
    });
}

async function sequentialExample() {

    const start = Date.now();

    const resultA = await taskA();
    const resultB = await taskB();

    const end = Date.now();

    console.log(resultA);
    console.log(resultB);
    console.log("Time taken:", end - start, "ms");
}

sequentialExample();


/**
 * ============================================================
 * 2️⃣ Parallel Execution with Promise.all()
 * ============================================================
 */

async function parallelExample() {

    const start = Date.now();

    const results = await Promise.all([
        taskA(),
        taskB()
    ]);

    const end = Date.now();

    console.log(results);
    console.log("Time taken:", end - start, "ms");
}

setTimeout(parallelExample, 2500);


/**
 * Promise.all():
 * - Runs all promises simultaneously
 * - Returns array of results
 * - Rejects if ANY promise fails
 */


/**
 * ============================================================
 * 3️⃣ Promise.race()
 * ============================================================
 */

function slowTask() {
    return new Promise(resolve => {
        setTimeout(() => resolve("Slow task finished"), 3000);
    });
}

function fastTask() {
    return new Promise(resolve => {
        setTimeout(() => resolve("Fast task finished"), 1000);
    });
}

async function raceExample() {

    const result = await Promise.race([
        slowTask(),
        fastTask()
    ]);

    console.log("Race winner:", result);
}

setTimeout(raceExample, 5000);


/**
 * Promise.race():
 * - Returns the FIRST finished promise
 * - Useful for timeout systems
 */


/**
 * ============================================================
 * BACKEND STYLE EXAMPLE
 * ============================================================
 *
 * Example: Load dashboard data
 */

async function loadDashboard() {

    const [user, orders] = await Promise.all([
        taskA(),
        taskB()
    ]);

    console.log("Dashboard loaded:", user, orders);
}

setTimeout(loadDashboard, 7000);


/**
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ Promise.all() runs tasks in parallel
 * ✔ Faster backend responses
 * ✔ Promise.race() returns first finished promise
 * ✔ Useful for timeout logic
 *
 * ============================================================
 */