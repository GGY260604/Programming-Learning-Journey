/**
 * ============================================================
 * 01 - math.js
 * ============================================================
 *
 * This file exports functions.
 * It will be imported by another file.
 *
 * This simulates backend modular design.
 * ============================================================
 */

function add(a, b) {
    return a + b;
}

function subtract(a, b) {
    return a - b;
}

/**
 * module.exports defines what this file exposes
 */

module.exports = {
    add,
    subtract
};