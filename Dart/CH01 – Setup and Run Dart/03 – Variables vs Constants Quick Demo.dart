/*
-------------------------------------
    Dart - Variable vs Constant
-------------------------------------
This file gives a quick preview.
Details will be explained in CH03.

Keywords:
- var     -> variable (can change)
- final   -> runtime constant
- const   -> compile-time constant
*/

void main() {
  var age = 20;
  age = 21; // allowed

  final name = "Galen";
  // name = "Other"; // ERROR

  const pi = 3.14;
  // pi = 3.14159; // ERROR

  print(age);
  print(name);
  print(pi);
}

/*
Output:
21
Galen
3.14

Note:
- Use final heavily in Flutter
- const is stricter than final
*/
