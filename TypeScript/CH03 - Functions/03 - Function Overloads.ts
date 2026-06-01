/**
 * Function overloads allow multiple function signatures
 * for the same function implementation.
 */

/**
 * Overload signatures
 */
function format(input: number): string;
function format(input: string): string;

/**
 * Implementation
 */
function format(input: string | number): string {
  if (typeof input === "number") {
    return `Number: ${input.toFixed(2)}`;
  } else {
    return `Text: ${input.toUpperCase()}`;
  }
}

console.log(format(3.1415));
console.log(format("typescript"));


// ❌ invalid
// format(true)


/**
 * Why overloads?
 *
 * They provide better autocomplete and stricter API design.
 *
 * Very common in libraries.
 */