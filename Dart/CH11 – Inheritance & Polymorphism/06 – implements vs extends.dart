/*
-------------------------------------
      OOP - implements vs extends
-------------------------------------

extends:
- inherit implementation
- single inheritance only

implements:
- inherit ONLY method signatures
- must implement EVERYTHING
*/

abstract class Flyable {
  void fly();
}

class Bird implements Flyable {
  @override
  void fly() {
    print("Bird flies");
  }
}

void main() {
  Bird b = Bird();
  b.fly();
}

/*
-------------------------------------
Common Beginner Confusion ❌
-------------------------------------

implements does NOT reuse code.
It only enforces structure.
*/
