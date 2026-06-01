/**
 * In JavaScript, API responses are often untyped.
 *
 * TypeScript allows defining response shapes.
 */

type ApiResponse<T> = {
  success: boolean
  data: T
}

/**
 * Example data structure
 */

type User = {
  id: number
  name: string
}

function handleUserResponse(response: ApiResponse<User>) {

  if (response.success) {
    console.log("User:", response.data.name);
  }

}

handleUserResponse({
  success: true,
  data: {
    id: 1,
    name: "Galen"
  }
});


/**
 * Another API example
 */

type Product = {
  id: number
  price: number
}

const productResponse: ApiResponse<Product> = {
  success: true,
  data: {
    id: 101,
    price: 5000
  }
}

console.log(productResponse.data.price);