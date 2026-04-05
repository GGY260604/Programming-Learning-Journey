/**
 * TypeScript provides two main ways to define object shapes:
 * - interface
 * - type alias
 */

/**
 * Interface
 */

interface Person {
  name: string
  age: number
}

const p1: Person = {
  name: "Alice",
  age: 25
};


/**
 * Type alias
 */

type PersonType = {
  name: string
  age: number
};

const p2: PersonType = {
  name: "Bob",
  age: 30
};


/**
 * Both behave very similarly for objects.
 */

function printPerson(person: Person) {
  console.log(`${person.name} is ${person.age}`);
}

printPerson(p1);


/**
 * Type alias can represent more complex types
 */

type ID = string | number;

let userId: ID = 123;
userId = "user-123";


/**
 * General rule in many projects:
 *
 * interface -> object structures
 * type -> unions, advanced types
 */