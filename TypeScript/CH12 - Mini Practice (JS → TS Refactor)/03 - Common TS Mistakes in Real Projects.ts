/**
 * Mistake 1: Overusing "any"
 */

let value: any = "hello";

value = 123;
value = true;

console.log(value);

/**
 * Problem:
 * Type safety disappears.
 */


/**
 * Better approach: unknown
 */

let safeValue: unknown = "hello";

if (typeof safeValue === "string") {
  console.log(safeValue.toUpperCase());
}


/**
 * Mistake 2: ignoring null or undefined
 */

type User = {
  name?: string
}

const user: User = {};

/**
 * ❌ risky
 */

// console.log(user.name.toUpperCase())


/**
 * Safe handling
 */

if (user.name) {
  console.log(user.name.toUpperCase());
}


/**
 * Mistake 3: incorrect object shape
 */

type Product = {
  id: number
  price: number
}

const item: Product = {
  id: 10,
  price: 200
};

console.log(item);


/**
 * TypeScript protects against:
 *
 * missing properties
 * wrong types
 * unsafe operations
 */