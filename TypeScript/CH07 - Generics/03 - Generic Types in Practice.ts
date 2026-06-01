/**
 * Generics are widely used in real projects
 * such as APIs and data structures.
 */

/**
 * Example: API response wrapper
 */

type ApiResponse<T> = {
  success: boolean
  data: T
};

const userResponse: ApiResponse<{ id: number; name: string }> = {
  success: true,
  data: {
    id: 1,
    name: "Galen"
  }
};

console.log(userResponse.data.name);


/**
 * Generic class
 */

class Box<T> {

  private content: T;

  constructor(value: T) {
    this.content = value;
  }

  getValue(): T {
    return this.content;
  }

}

const numberBox = new Box<number>(100);
const stringBox = new Box<string>("Hello");

console.log(numberBox.getValue());
console.log(stringBox.getValue());


/**
 * Generic array utility
 */

function firstElement<T>(arr: T[]): T | undefined {
  return arr[0];
}

console.log(firstElement([10, 20, 30]));
console.log(firstElement(["a", "b", "c"]));


/**
 * Generics are heavily used in:
 *
 * React useState<T>()
 * API clients
 * database query libraries
 * reusable utilities
 */