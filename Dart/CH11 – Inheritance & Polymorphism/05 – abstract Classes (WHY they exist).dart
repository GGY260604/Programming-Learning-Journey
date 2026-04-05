/*
-------------------------------------
       OOP - Abstract Class (Correct Model)
-------------------------------------

This file corrects a VERY common misunderstanding.

Abstract class is NOT just an interface.
*/

/*
-------------------------------------
1) Abstract class with ATTRIBUTES
-------------------------------------
*/

abstract class Person {

  /*
  Fields ARE allowed.
  These represent shared state.
  */
  String name;
  int age;

  /*
  Abstract class CAN have a constructor.
  Used to initialize common state.
  */
  Person(this.name, this.age);

  /*
  -------------------------------------
  Abstract method (NO implementation)
  -------------------------------------

  Child classes MUST implement this.
  */
  void role();

  /*
  -------------------------------------
  Concrete method (HAS implementation)
  -------------------------------------

  Child classes INHERIT this directly.
  */
  void introduce() {
    print("My name is $name, age $age");
  }
}

/*
-------------------------------------
2) Concrete subclass
-------------------------------------
*/

class Student extends Person {
  String studentId;

  Student(String name, int age, this.studentId)
      : super(name, age);

  @override
  void role() {
    print("I am a student, ID: $studentId");
  }
}

void main() {

  /*
  Cannot instantiate abstract class:
  */
  // Person p = Person("Galen", 22); // ERROR

  Person s = Student("Galen", 22, "S123");

  /*
  Works because:
  - Object is Student
  - Variable type is Person
  */

  s.introduce(); // inherited concrete method
  s.role();      // overridden abstract method
}
