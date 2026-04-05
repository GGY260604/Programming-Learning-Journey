/**
 * Utility Types modify existing types.
 * They are built into TypeScript and very common in real projects.
 */

interface User {
  id: number
  name: string
  email: string
}

/**
 * Partial<T>
 * Makes all properties optional
 */

type PartialUser = Partial<User>

const updateUser: PartialUser = {
  name: "Alice"
}

console.log(updateUser)

/**
 * Very useful for update APIs
 * because users may only update some fields.
 */


/**
 * Required<T>
 * Makes all properties required
 */

type RequiredUser = Required<User>

const fullUser: RequiredUser = {
  id: 1,
  name: "Bob",
  email: "bob@example.com"
}

console.log(fullUser)


/**
 * Readonly<T>
 * Prevents modification
 */

type ReadonlyUser = Readonly<User>

const user: ReadonlyUser = {
  id: 10,
  name: "Galen",
  email: "galen@email.com"
}

console.log(user)

// ❌ not allowed
// user.name = "New Name"