/**
 * Abstract classes cannot be instantiated directly.
 * They act as base classes.
 */

abstract class Shape {

  abstract area(): number;

  describe() {
    console.log("This is a shape");
  }

}

class Circle extends Shape {

  constructor(private radius: number) {
    super();
  }

  area(): number {
    return Math.PI * this.radius * this.radius;
  }

}

const circle = new Circle(5);

circle.describe();
console.log("Area:", circle.area());


/**
 * Why abstract classes?
 *
 * They enforce that subclasses implement required methods.
 */

// ❌ not allowed
// const shape = new Shape()