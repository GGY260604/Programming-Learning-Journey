/**
 * Union Types
 *
 * A variable can have multiple possible types.
 */

let id: string | number;

id = 101;
console.log(id);

id = "user-101";
console.log(id);


/**
 * Example: API response status
 */

let status: "loading" | "success" | "error";

status = "loading";
console.log(status);

status = "success";

// ❌ invalid
// status = "finished";


/**
 * Practical example
 */

function printId(id: string | number) {
  if (typeof id === "string") {
    console.log("String ID:", id.toUpperCase());
  } else {
    console.log("Numeric ID:", id);
  }
}

printId("abc123");
printId(100);


/**
 * Literal types allow only specific values.
 */

let direction: "north" | "south" | "east" | "west";

direction = "north";

console.log("Direction:", direction);