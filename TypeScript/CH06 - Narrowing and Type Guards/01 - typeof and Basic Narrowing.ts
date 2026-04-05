/**
 * Type Narrowing
 *
 * When a variable has multiple possible types (union),
 * TypeScript can narrow it down based on conditions.
 */

function printValue(value: string | number) {

  // typeof helps TypeScript determine the actual type
  if (typeof value === "string") {
    console.log("String value:", value.toUpperCase());
  } else {
    console.log("Number value:", value.toFixed(2));
  }
}

printValue("hello");
printValue(3.14159);


/**
 * Without narrowing, TypeScript will not allow this:
 */

// function badExample(value: string | number) {
//   value.toUpperCase()   // ❌ not safe
// }

/**
 * Because value could be number.
 *
 * Narrowing ensures safe operations.
 */