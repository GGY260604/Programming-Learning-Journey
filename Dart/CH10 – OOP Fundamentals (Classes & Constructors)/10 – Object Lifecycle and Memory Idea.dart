/*
-------------------------------------
       OOP - Object Lifecycle
-------------------------------------

This file explains how objects live and die.
*/

class Person {
  String name;

  Person(this.name) {
    print("Person object created");
  }

  void introduce() {
    print("My name is $name");
  }
}

void main() {
  /*
  Object is created here
  */
  Person p = Person("Galen");

  p.introduce();
  /*
  Object lives as long as it is referenced.
  */

  p = Person("Alex");

  p.introduce();
  /*
  Old object becomes unreachable
  and is eligible for garbage collection.
  */
}

/*
Important:
- Dart uses automatic garbage collection
- You NEVER manually delete objects
*/
