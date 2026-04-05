/**
 * TypeScript can automatically figure out types.
 * This is called "Type Inference".
 *
 * You only need to write types when:
 * - the variable starts empty
 * - function parameters
 * - complex structures
 */

// TypeScript infers this as string
let framework = "Next.js";

framework = "React"; // OK

// ❌ Try this
// framework = 123;
// TypeScript error: number not assignable to string

console.log("Framework:", framework);


/**
 * Explicit typing
 * Sometimes we declare the type manually.
 */

let port: number = 3000;

port = 4000; // OK

// ❌
// port = "3000";

console.log("Server port:", port);


/**
 * When inference is very useful
 */

const language = "TypeScript";

/*
TypeScript infers:
language: "TypeScript"

Not just string — but the literal type "TypeScript"
because it is const.
*/

console.log("Language:", language);