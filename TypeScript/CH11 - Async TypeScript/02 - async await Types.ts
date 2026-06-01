/**
 * async/await is a cleaner way to handle Promises.
 */

type Product = {
  id: number
  name: string
  price: number
};

/**
 * Async functions automatically return Promise<T>
 */

async function fetchProduct(): Promise<Product> {

  // simulate delay
  await new Promise((resolve) => setTimeout(resolve, 500));

  return {
    id: 101,
    name: "Laptop",
    price: 5000
  };
}


/**
 * Using await
 */

async function run() {

  const product = await fetchProduct();

  console.log(product.name);
  console.log(product.price);

}

run();


/**
 * TypeScript understands that:
 *
 * await fetchProduct()
 *
 * resolves to Product
 */