/*
-------------------------------------
       OOP - Object State
-------------------------------------

This file explains what "state" means.
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

  /*
  -------------------------------------
  Each object has its OWN state
  -------------------------------------
  */

  Person p1 = Person("Galen", 22);
  Person p2 = Person("Alex", 30);

  p1.introduce();
  p2.introduce();

  /*
  Changing one object does NOT
  affect another.
  */

  p1.age++;
  p1.introduce();
  p2.introduce();
}

/*
State = data stored inside an object.

Objects do NOT share state
unless explicitly designed to.
*/
