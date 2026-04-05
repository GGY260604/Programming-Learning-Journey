/*
-------------------------------------
        OOP - Polymorphism
-------------------------------------

Polymorphism means:
- Same interface
- Different behavior
*/

class Animal {
  void speak() {
    print("Animal sound");
  }
}

class Dog extends Animal {
  @override
  void speak() {
    print("Bark");
  }
}

class Cat extends Animal {
  @override
  void speak() {
    print("Meow");
  }
}

void main() {
  List<Animal> animals = [
    Dog(),
    Cat(),
  ];

  for (Animal a in animals) {
    a.speak(); // behavior depends on REAL object
  }
}

/*
-------------------------------------
Key Concept
-------------------------------------

Variable type ≠ object type

Animal a = Dog();

- Variable sees Animal
- Runtime executes Dog behavior
*/
