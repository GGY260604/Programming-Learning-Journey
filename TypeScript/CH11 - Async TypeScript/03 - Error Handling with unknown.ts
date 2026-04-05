/**
 * In TypeScript, errors should be treated as unknown.
 * This forces us to safely inspect them.
 */

function riskyOperation() {
  throw new Error("Something went wrong");
}

try {

  riskyOperation();

} catch (error: unknown) {

  /**
   * We must narrow the type first
   */

  if (error instanceof Error) {
    console.log("Error message:", error.message);
  } else {
    console.log("Unknown error");
  }

}


/**
 * Example with async error handling
 */

async function fetchData() {

  try {

    throw new Error("Server failed");

  } catch (err: unknown) {

    if (err instanceof Error) {
      console.log("Async error:", err.message);
    }

  }

}

fetchData();


/**
 * Why unknown instead of any?
 *
 * any  -> disables safety
 * unknown -> forces proper checking
 */