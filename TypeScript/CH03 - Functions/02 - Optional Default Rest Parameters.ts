/**
 * Optional parameters
 * Add ? after the parameter name
 */

function greet(name: string, title?: string) {
  if (title) {
    console.log(`Hello ${title} ${name}`);
  } else {
    console.log(`Hello ${name}`);
  }
}

greet("Galen");
greet("Galen", "Dr");


/**
 * Default parameters
 */

function startServer(port: number = 3000) {
  console.log("Server started on port", port);
}

startServer();
startServer(8080);


/**
 * Rest parameters
 */

function sum(...numbers: number[]): number {
  let total = 0;

  for (const num of numbers) {
    total += num;
  }

  return total;
}

console.log("Sum:", sum(1, 2, 3, 4, 5));


/**
 * Important:
 * numbers: number[]
 * means an array of numbers
 */