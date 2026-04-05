/**
 * In JavaScript, objects can have any structure.
 * TypeScript allows us to define the structure (shape) of an object.
 */

const user: { id: number; name: string; isAdmin: boolean } = {
  id: 1,
  name: "Galen",
  isAdmin: false
};

console.log(user.name);

/**
 * If we try to assign the wrong structure,
 * TypeScript will detect it.
 */

// ❌ Missing property
// const badUser: { id: number; name: string } = { id: 1 }

// ❌ Wrong type
// const badUser2: { id: number; name: string } = { id: "1", name: "Alice" }


/**
 * Functions can also require object shapes
 */

function printUser(u: { id: number; name: string }) {
  console.log(`User ${u.id}: ${u.name}`);
}

printUser({ id: 10, name: "Alice" });

/**
 * Problem:
 * Writing object types repeatedly becomes messy.
 * That's why we use interfaces or type aliases.
 */