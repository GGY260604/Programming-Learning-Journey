/**
 * ============================================================
 * 01 - What is Backend Security.js
 * ============================================================
 *
 * Goal:
 * - Understand why backend security matters
 * - Learn common attack types (high-level)
 * - Know what we will protect in next files
 *
 * Run:
 * node "01 - What is Backend Security.js"
 *
 * ============================================================
 */

console.log("===== Backend Security Basics =====");

/**
 * A backend is exposed to the internet.
 * Anyone can send requests to your API.
 *
 * So the backend must protect:
 * - user data
 * - server resources
 * - database
 * - authentication system
 */

console.log("\nBackend must protect data and resources.");

/**
 * ============================================================
 * Common security problems (high level)
 * ============================================================
 *
 * We will keep this non-graphic and beginner friendly.
 */

const risks = [
  "Unauthorized access (missing authentication/authorization)",
  "Data leakage (returning too much info)",
  "Brute-force login attempts (too many requests)",
  "Cross-site requests (CORS misconfiguration)",
  "Bad input (no validation, possible injection risks)",
];

console.log("\nCommon backend risks:");
risks.forEach((r) => console.log("-", r));

/**
 * ============================================================
 * What we will learn in this chapter
 * ============================================================
 */

console.log("\n===== What we will learn =====");

const topics = [
  "CORS: allow your frontend domain to call your backend",
  "Helmet: add security headers automatically",
  "Rate limiting: reduce spam / brute-force attempts",
  "Safer input handling: validate + sanitize basics",
];

topics.forEach((t) => console.log("-", t));

/**
 * ============================================================
 * KEY TAKEAWAYS
 * ============================================================
 *
 * ✔ Backends are public targets (anyone can request)
 * ✔ Security is not optional in real apps
 * ✔ We use middleware tools to protect Express apps
 *
 * ============================================================
 */