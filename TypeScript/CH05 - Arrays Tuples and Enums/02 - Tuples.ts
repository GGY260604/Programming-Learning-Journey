/**
 * Tuple = fixed length array with specific types per position
 *
 * JavaScript arrays don't enforce positions.
 * TypeScript tuples do.
 */

let user: [number, string];

user = [1, "Alice"];

console.log(user);


/**
 * Access tuple elements
 */

const id = user[0];
const name = user[1];

console.log(id, name);


/**
 * Example: API response pattern
 */

type ApiResult = [boolean, string];

const response: ApiResult = [true, "Success"];

console.log(response);


/**
 * Named tuple (clearer)
 */

type Point = [x: number, y: number];

const position: Point = [10, 20];

console.log(position);


/**
 * Tuple with optional element
 */

type UserInfo = [number, string, boolean?];

const u1: UserInfo = [1, "Galen"];
const u2: UserInfo = [2, "Alice", true];

console.log(u1, u2);