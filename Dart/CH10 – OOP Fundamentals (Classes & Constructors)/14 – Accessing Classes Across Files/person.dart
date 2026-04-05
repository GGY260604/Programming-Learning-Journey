/*
-------------------------------------
            person.dart
-------------------------------------

This file defines the Person class.

In Dart:
- Each file is a LIBRARY
- '_' means library-private (file-private)
*/

class Person {
  String name;
  int _age; // private to this file

  Person(this.name, this._age);

  int get age => _age;

  void celebrateBirthday() {
    _age++;
  }
}
