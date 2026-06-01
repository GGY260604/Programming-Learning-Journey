/**
 * The "in" operator checks if a property exists in an object
 */

interface Cat {
  meow: () => void
}

interface Dog {
  bark: () => void
}

function makeSound(animal: Cat | Dog) {

  if ("meow" in animal) {
    animal.meow();
  } else {
    animal.bark();
  }

}

const cat: Cat = {
  meow: () => console.log("Meow")
};

const dog: Dog = {
  bark: () => console.log("Woof")
};

makeSound(cat);
makeSound(dog);


/**
 * instanceof
 * Used with classes
 */

class Car {
  drive() {
    console.log("Driving");
  }
}

class Bike {
  ride() {
    console.log("Riding");
  }
}

function move(vehicle: Car | Bike) {

  if (vehicle instanceof Car) {
    vehicle.drive();
  } else {
    vehicle.ride();
  }

}

move(new Car());
move(new Bike());