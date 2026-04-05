/**
 * Pick<T, K>
 * Select specific properties from a type
 */

interface Product {
  id: number
  name: string
  price: number
  description: string
}

type ProductPreview = Pick<Product, "id" | "name">

const preview: ProductPreview = {
  id: 1,
  name: "Laptop"
}

console.log(preview)


/**
 * Omit<T, K>
 * Remove specific properties
 */

type ProductWithoutDesc = Omit<Product, "description">

const item: ProductWithoutDesc = {
  id: 2,
  name: "Phone",
  price: 2000
}

console.log(item)


/**
 * Record<K, T>
 * Creates an object type with dynamic keys
 */

type UserRoles = Record<string, string>

const roles: UserRoles = {
  alice: "admin",
  bob: "user",
  carol: "guest"
}

console.log(roles)


/**
 * Example with limited keys
 */

type Role = "admin" | "user" | "guest"

type RolePermissions = Record<Role, number>

const permissions: RolePermissions = {
  admin: 10,
  user: 5,
  guest: 1
}

console.log(permissions)