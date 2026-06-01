/**
 * Interface defines the shape of an object.
 * It improves readability and reuse.
 */

interface User {
  id: number
  name: string
  isAdmin: boolean
}

const user1: User = {
  id: 1,
  name: "Galen",
  isAdmin: false
};

console.log(user1);


/**
 * Optional properties
 */

interface Product {
  id: number
  name: string
  price: number
  description?: string
}

const item: Product = {
  id: 101,
  name: "Laptop",
  price: 5000
};

console.log(item);


/**
 * Interfaces are extremely common in:
 * - API response typing
 * - React props
 * - database models
 */

interface ApiResponse {
  success: boolean
  data: string
}

function handleResponse(res: ApiResponse) {
  console.log("Success:", res.success);
  console.log("Data:", res.data);
}

handleResponse({
  success: true,
  data: "Server OK"
});