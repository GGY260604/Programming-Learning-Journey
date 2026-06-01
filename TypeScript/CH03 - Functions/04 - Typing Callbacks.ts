/**
 * Callbacks are functions passed as parameters.
 * Very common in JavaScript.
 */

function processNumbers(
  numbers: number[],
  callback: (num: number) => number
): number[] {

  const result: number[] = [];

  for (const n of numbers) {
    result.push(callback(n));
  }

  return result;
}

/**
 * Using the function
 */

const nums = [1, 2, 3, 4];

const doubled = processNumbers(nums, (n) => n * 2);

console.log("Doubled:", doubled);


/**
 * Another example similar to Array.map
 */

function mapStrings(
  items: string[],
  transform: (item: string) => string
) {
  const result: string[] = [];

  for (const item of items) {
    result.push(transform(item));
  }

  return result;
}

const words = ["ai", "disaster", "prediction"];

const upper = mapStrings(words, (w) => w.toUpperCase());

console.log("Upper:", upper);


/**
 * TypeScript ensures the callback input/output types match.
 */