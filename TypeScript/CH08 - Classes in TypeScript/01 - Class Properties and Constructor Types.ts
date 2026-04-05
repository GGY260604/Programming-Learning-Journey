/**
 * Classes in TypeScript are similar to JavaScript classes,
 * but we can add type annotations for properties and methods.
 */

class User {

  id: number;
  name: string;

  constructor(id: number, name: string) {
    this.id = id;
    this.name = name;
  }

  greet(): string {
    return `Hello, ${this.name}`;
  }

}

const user = new User(1, "Galen");

console.log(user.greet());


/**
 * TypeScript also supports a shorthand syntax
 * where constructor parameters automatically
 * create class properties.
 */

class Product {

  constructor(
    public id: number,
    public name: string,
    public price: number
  ) {}

}

const laptop = new Product(101, "Laptop", 5000);

console.log(laptop.name);