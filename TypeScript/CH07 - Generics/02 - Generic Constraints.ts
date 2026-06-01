/**
 * Sometimes we want generics,
 * but still require certain properties.
 *
 * We use "extends" to constrain the type.
 */

function getLength<T extends { length: number }>(item: T): number {
  return item.length;
}

console.log(getLength("hello"));
console.log(getLength([1, 2, 3]));

/**
 * This works because:
 * string has length
 * array has length
 */

// ❌ This would fail
// getLength(100)


/**
 * Using constraints with objects
 */

interface HasId {
  id: number
}

function printId<T extends HasId>(obj: T) {
  console.log("ID:", obj.id);
}

printId({ id: 1, name: "Alice" });

/**
 * The object can have additional fields,
 * but must contain id.
 */


/**
 * Multiple generic parameters
 */

function pair<T, U>(a: T, b: U): [T, U] {
  return [a, b];
}

const pairResult = pair("age", 25);

console.log(pairResult);