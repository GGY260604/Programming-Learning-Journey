/**
 * What this file teaches:
 * - How TypeScript runs in real life (it doesn't run directly in Node)
 * - Two common workflows:
 *   (A) ts-node (run .ts directly)
 *   (B) tsc -> node (compile to .js then run)
 *
 * You can run this file with either:
 * 1) npx ts-node "CH01 - Setup and Running TypeScript/01 - Install and Run.ts"
 * or
 * 2) npx tsc && node dist/CH01\ -\ Setup\ and\ Running\ TypeScript/01\ -\ Install\ and\ Run.js
 *
 * Notes:
 * - TypeScript adds types at development time.
 * - At runtime, it's just JavaScript.
 */

// ✅ This is valid JavaScript AND valid TypeScript
const appName = "Disaster Resilience AI";
console.log("App:", appName);

// ✅ TypeScript can infer types automatically (type inference)
const year = 2026; // inferred as number
console.log("Year:", year);

// ✅ You can add explicit types when useful
let serverPort: number = 3000;
serverPort += 1;
console.log("Port:", serverPort);

// ❌ Try uncommenting this line and see what TypeScript prevents:
// serverPort = "3000"; // Type 'string' is not assignable to type 'number'

// ✅ TypeScript helps with "shape" of objects
const user = {
  id: 1,
  name: "Galen",
  isAdmin: false,
};

console.log("User:", user.name);

// ❌ Try uncommenting to see TypeScript catch a typo:
// console.log(user.nam); // Property 'nam' does not exist

/**
 * Key idea:
 * - JS would allow many mistakes until runtime.
 * - TS catches many of them before you run the code.
 */