/*
-------------------------------------
       OOP - Initialization List (:)
-------------------------------------

The initialization list runs BEFORE the constructor body.

Why it exists:
1) To initialize final fields
2) To compute initial values cleanly
3) To call super() with computed values
4) To validate early with asserts

Syntax:
Constructor(...) : field = value, field2 = value2 { ... }
*/

class Person {
  final String name;   // final must be set exactly once
  final int age;

  Person(String name, int age)
      : name = name.trim(),         // initialization list
        age = (age < 0) ? 0 : age { // initialization list
    /*
    Constructor body runs AFTER the init list.
    At this point, final fields are already set.
    */
    print("Person created");
  }

  void introduce() {
    print("Name: $name, Age: $age");
  }
}

void main() {
  Person("  Galen  ", -10).introduce();
}

/*
Common careless mistakes ❌
- Trying to assign final fields in the constructor body:
  Person(...) { name = ...; } // not allowed if name is final

- Assuming init list runs after body (it runs BEFORE)
*/
