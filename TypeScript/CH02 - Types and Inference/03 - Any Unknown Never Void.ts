/**
 * any
 *
 * Disables type checking.
 * Similar to pure JavaScript.
 */

let data: any = "hello";

data = 123;
data = true;

console.log("Any:", data);

/**
 * Avoid using "any" unless necessary
 * because it removes TypeScript safety.
 */


/**
 * unknown
 *
 * Safer alternative to any.
 * You must check type before using it.
 */

let value: unknown = "TypeScript";

// ❌ Error
// value.toUpperCase()

if (typeof value === "string") {
  console.log(value.toUpperCase());
}


/**
 * void
 *
 * Used for functions that return nothing
 */

function logMessage(msg: string): void {
  console.log("Message:", msg);
}

logMessage("Hello");


/**
 * never
 *
 * Means something should NEVER happen.
 */

function throwError(message: string): never {
  throw new Error(message);
}

// throwError("Something went wrong");

/**
 * never is used in:
 * - exhaustive checks
 * - functions that always throw
 * - infinite loops
 */