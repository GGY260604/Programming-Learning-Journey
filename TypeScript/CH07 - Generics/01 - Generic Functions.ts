/**
 * Generics allow functions to work with many types
 * while still preserving type safety.
 *
 * Instead of writing multiple functions for each type,
 * we write one generic function.
 */

// Without generics
function identityNumber(value: number): number {
  return value;
}

function identityString(value: string): string {
  return value;
}

console.log(identityNumber(10));
console.log(identityString("hello"));


/**
 * With generics
 */

function identity<T>(value: T): T {
  return value;
}

// TypeScript infers T automatically
console.log(identity(100));
console.log(identity("TypeScript"));
console.log(identity(true));


/**
 * We can also specify the type manually
 */

const result = identity<number>(123);

console.log(result);


/**
 * Another example
 */

function wrapInArray<T>(item: T): T[] {
  return [item];
}

console.log(wrapInArray("hello"));
console.log(wrapInArray(5));


/**
 * Key idea:
 *
 * T is a placeholder type.
 * It represents whatever type is passed in.
 */