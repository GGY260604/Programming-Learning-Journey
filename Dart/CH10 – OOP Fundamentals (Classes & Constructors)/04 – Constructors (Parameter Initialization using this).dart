/*
-------------------------------------
  OOP - Constructor (this parameter)
-------------------------------------

Dart provides a shorthand:

Person(this.name, this.age)

Meaning:
- create parameters automatically
- assign them to fields automatically

This is the MOST common style in Flutter models.
*/

class Person {
  String name;
  int age;

  Person(this.name, this.age);

  void introduce() {
    print("Name: $name, Age: $age");
  }
}

void main() {
  Person("Galen", 22).introduce();
}

/*
Constraints:
- Works only when you want direct assignment
- Cannot add custom logic inside the parameter list
  (for custom logic, use block body or init list)
*/
