/*
-------------------------------------
    OOP - Redirecting Constructors
-------------------------------------

A redirecting constructor calls another constructor
of the SAME class.

Why useful:
- Avoid repeating initialization logic
*/

class Person {
  final String name;
  final int age;

  Person(this.name, this.age);

  // Redirects to the main constructor
  Person.withDefaultAge(String name) : this(name, 18);
  // No body allowed here

  void introduce() {
    print("Name: $name, Age: $age");
  }
}

void main() {
  Person.withDefaultAge("Galen").introduce();
}

/*
Common careless mistake ❌
- Trying to put both redirect and body:
  Person.withDefaultAge(...) : this(...) { } // not allowed
*/
