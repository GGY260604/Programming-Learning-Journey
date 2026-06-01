/**
 * TypeScript basic primitive types
 * (same as JavaScript values but with static typing)
 */

let username: string = "Galen";
let age: number = 21;
let isStudent: boolean = true;

console.log(username);
console.log(age);
console.log(isStudent);


/**
 * BigInt
 */

let bigNumber: bigint = 9007199254740991n;
console.log("BigInt:", bigNumber);


/**
 * Null and Undefined
 */

let nothing: null = null;
let notAssigned: undefined = undefined;

console.log(nothing);
console.log(notAssigned);


/**
 * JavaScript type check still works
 */

console.log(typeof username);
console.log(typeof age);
console.log(typeof isStudent);


/**
 * Important difference from JS:
 * In strict mode, TypeScript separates:
 *
 * string
 * number
 * boolean
 * null
 * undefined
 *
 * which prevents many runtime bugs.
 */