/**
 * Enum = named constants
 *
 * Useful when a variable should only have certain values.
 */

enum Status {
  Pending,
  Success,
  Error
}

let currentStatus: Status = Status.Pending;

console.log(currentStatus);


/**
 * Numeric enums auto increment
 */

console.log(Status.Pending); // 0
console.log(Status.Success); // 1
console.log(Status.Error);   // 2


/**
 * String enums
 */

enum Direction {
  North = "NORTH",
  South = "SOUTH",
  East = "EAST",
  West = "WEST"
}

let move: Direction = Direction.North;

console.log(move);


/**
 * Modern alternative to enums
 * (commonly used in modern TypeScript projects)
 */

type Role = "admin" | "user" | "guest";

let role: Role = "admin";

console.log(role);

// ❌ role = "superadmin"


/**
 * Why unions are often preferred:
 *
 * - simpler
 * - no runtime object generated
 * - easier with APIs and JSON
 */