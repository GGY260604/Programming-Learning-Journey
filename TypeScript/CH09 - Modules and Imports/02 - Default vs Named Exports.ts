/**
 * There are two export styles in TypeScript / JavaScript modules.
 *
 * 1) Named exports
 * 2) Default exports
 */

/**
 * Named export
 */

export function multiply(a: number, b: number): number {
  return a * b;
}


/**
 * Default export
 */

export default function greet(name: string) {
  return `Hello ${name}`;
}


/**
 * Import examples (in another file)
 *
 * Named import:
 *
 * import { multiply } from "./math"
 *
 * Default import:
 *
 * import greet from "./greet"
 *
 * Mixed:
 *
 * import greet, { multiply } from "./utils"
 */


/**
 * Demo usage inside this file
 */

console.log(multiply(4, 5));
console.log(greet("Galen"));