/*
-------------------------------------
       Mixin Constraints (on)
-------------------------------------

Sometimes a mixin REQUIRES something.

Use 'on' to restrict usage.
*/

class Person {
  String name;

  Person(this.name);
}

mixin CanGreet on Person {
  void greet() {
    print("Hello, I am $name");
  }
}

class Student extends Person with CanGreet {
  Student(String name) : super(name);
}

void main() {
  Student s = Student("Galen");
  s.greet();
}

/*
-------------------------------------
Why this matters
-------------------------------------

- CanGreet assumes 'name' exists
- 'on Person' guarantees it

Careless mistake ❌
Using mixin without enforcing constraints
*/
