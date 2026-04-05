/*
-------------------------------------
   OOP - Inheritance vs Composition
-------------------------------------

Inheritance is NOT always the answer.

Rule:
- Use inheritance for "IS-A"
- Use composition for "HAS-A"
*/

class Engine {
  void start() {
    print("Engine started");
  }
}

class Car {
  Engine engine = Engine(); // HAS-A

  void drive() {
    engine.start();
    print("Car driving");
  }
}

void main() {
  Car c = Car();
  c.drive();
}

/*
-------------------------------------
Careless Usage ❌
-------------------------------------

Using inheritance when relationship is HAS-A
leads to rigid, fragile designs.

Flutter prefers composition.
*/
