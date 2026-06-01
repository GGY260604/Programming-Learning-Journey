/**
 * extends -> class inheritance
 * implements -> enforce structure from an interface
 */

class Animal {

  move() {
    console.log("Animal moving");
  }

}

class Dog extends Animal {

  bark() {
    console.log("Woof");
  }

}

const dog = new Dog();

dog.move();
dog.bark();


/**
 * implements
 */

interface Flyable {
  fly(): void;
}

class Bird implements Flyable {

  fly() {
    console.log("Bird flying");
  }

}

const bird = new Bird();

bird.fly();


/**
 * A class can implement multiple interfaces
 */

interface Swimmable {
  swim(): void;
}

class Duck implements Flyable, Swimmable {

  fly() {
    console.log("Duck flying");
  }

  swim() {
    console.log("Duck swimming");
  }

}

const duck = new Duck();

duck.fly();
duck.swim();