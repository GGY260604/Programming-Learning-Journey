/*
-------------------------------------
       mixin vs abstract class
-------------------------------------

Both provide reusable code,
but they solve DIFFERENT problems.
*/

abstract class Animal {
  void speak();
}

mixin CanFly {
  void fly() {
    print("Flying");
  }
}

class Bird extends Animal with CanFly {
  @override
  void speak() {
    print("Chirp");
  }
}

void main() {
  Bird b = Bird();
  b.speak();
  b.fly();
}

/*
-------------------------------------
Differences
-------------------------------------

abstract class:
- models "IS-A"
- can have constructors
- can hold state
- single inheritance only

mixin:
- models "HAS-A behavior"
- no constructors
- lightweight reuse
- multiple mixins allowed

Careless mistake ❌
Using mixin when inheritance is needed
*/
