/*
-------------------------------------
      Dart - Cascade Operator (..)
-------------------------------------

Allows multiple operations on the same object.
Very common in Flutter.
*/

class Person {
  String name = "";
  int age = 0;

  void introduce() {
    print("My name is $name, age $age");
  }

  void celebrateBirthday() {
    age++;
    print("Happy Birthday $name! You are now $age.");
  }
}

void main() {
  Person p = Person()
    ..name = "Galen"
    ..age = 22
    ..introduce();
  
  print("After a year...");
  p.celebrateBirthday();
}

/*
Benefits:
- Cleaner code
- Avoid repeating object name

Flutter usage:
- configuring widgets
- setting properties fluently
*/
