/*
-------------------------------------
              main.dart
-------------------------------------

This file USES the Person class
defined in another file.
*/

import 'person.dart';

void main() {

  /*
  The Person class is now visible
  because we imported person.dart
  */

  Person p = Person("Galen", 22);

  print(p.name);
  print(p.age);

  // p._age = 30; // ❌ ERROR: _age is private to person.dart

  p.celebrateBirthday();
  print(p.age);
}
