/**
 * Utility types can extract information from functions.
 */

/**
 * ReturnType<T>
 */

function getUser() {
  return {
    id: 1,
    name: "Alice"
  }
}

type User = ReturnType<typeof getUser>

const user: User = {
  id: 2,
  name: "Bob"
}

console.log(user)


/**
 * Parameters<T>
 * Extracts function parameters
 */

function createUser(name: string, age: number) {
  return { name, age }
}

type CreateUserParams = Parameters<typeof createUser>

const args: CreateUserParams = ["Galen", 21]

console.log(createUser(...args))


/**
 * Awaited<T>
 * Extracts resolved Promise type
 */

async function fetchData() {
  return {
    success: true,
    data: "Server response"
  }
}

type FetchResult = Awaited<ReturnType<typeof fetchData>>

const result: FetchResult = {
  success: true,
  data: "Cached response"
}

console.log(result)