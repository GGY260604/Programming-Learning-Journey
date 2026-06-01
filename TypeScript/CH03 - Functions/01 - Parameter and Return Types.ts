/**
 * In JavaScript, functions don't enforce parameter types.
 * In TypeScript, we can define the expected types.
 */

function add(a: number, b: number): number {
  return a + b;
}

const result = add(5, 3);
console.log("Result:", result);

// ❌ TypeScript prevents invalid calls
// add("5", "3")


/**
 * If a function returns nothing, TypeScript infers void
 */

function logUser(name: string): void {
  console.log("User:", name);
}

logUser("Galen");


/**
 * TypeScript can infer return types automatically
 */

function multiply(a: number, b: number) {
  return a * b; // inferred return type: number
}

console.log("Multiply:", multiply(4, 6));


/**
 * Arrow functions also support typing
 */

const divide = (a: number, b: number): number => {
  return a / b;
};

console.log("Divide:", divide(10, 2));