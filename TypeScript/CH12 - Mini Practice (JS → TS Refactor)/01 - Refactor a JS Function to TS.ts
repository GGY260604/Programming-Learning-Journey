/**
 * Original JavaScript code (no types)
 *
 * function calculateTotal(price, taxRate) {
 *   return price + price * taxRate;
 * }
 *
 * Problems:
 * - price might not be number
 * - taxRate might not be number
 */

function calculateTotal(price: number, taxRate: number): number {
  return price + price * taxRate;
}

const total = calculateTotal(100, 0.06);

console.log("Total:", total);


/**
 * TypeScript prevents incorrect usage
 */

// ❌ calculateTotal("100", "0.06")


/**
 * Example with objects
 */

type Order = {
  id: number
  amount: number
}

function printOrder(order: Order) {
  console.log(`Order #${order.id} = ${order.amount}`);
}

printOrder({ id: 1, amount: 200 });