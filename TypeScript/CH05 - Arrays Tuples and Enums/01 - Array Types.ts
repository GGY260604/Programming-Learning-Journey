/**
 * Arrays in TypeScript must define the type of elements inside.
 *
 * JavaScript:
 * const arr = [1, "hello", true]  // allowed
 *
 * TypeScript encourages consistent types.
 */

// Method 1: number[]
let numbers: number[] = [1, 2, 3, 4];

numbers.push(5); // OK

// ❌ numbers.push("hello")

console.log(numbers);


/**
 * Method 2: Array<Type>
 */

let names: Array<string> = ["Alice", "Bob", "Carol"];

names.push("David");

console.log(names);


/**
 * Array type inference
 */

const scores = [90, 85, 88];
// inferred as number[]

scores.push(100);

console.log(scores);


/**
 * Arrays of objects
 */

interface User {
  id: number
  name: string
}

const users: User[] = [
  { id: 1, name: "Alice" },
  { id: 2, name: "Bob" }
];

for (const user of users) {
  console.log(user.name);
}


/**
 * Useful with array functions
 */

const doubled = numbers.map(n => n * 2);

console.log("Doubled:", doubled);