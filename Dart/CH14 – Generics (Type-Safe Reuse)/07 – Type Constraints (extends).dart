/*
-------------------------------------
    Generic Constraints (extends)
-------------------------------------

Sometimes, T must support certain behavior.

Use 'extends' to restrict T.
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

// T is constrained to be Animal or its subclasses
T makeSpeak<T extends Animal>(T animal) {
  animal.speak(); // safe
  return animal;
}

void main() {
  makeSpeak(Dog()); // Dart infers T as Dog

  // makeSpeak("text"); // ❌ compile-time error
}

/*
Key idea:
extends here means:
"T must be Animal or a subclass"
*/
