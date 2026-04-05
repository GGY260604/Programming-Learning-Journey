/*
-------------------------------------
      Dart - var vs Explicit Type
-------------------------------------

Dart supports type inference.

Meaning:
- Dart can guess the type from the value
*/

void main() {

  var age = 20;        // inferred as int
  var price = 9.99;   // inferred as double
  var name = "Galen"; // inferred as String

  // age = "twenty";  // ERROR: type already fixed

  print(age);
  print(price);
  print(name);
}

/*
Important Rules:
- var does NOT mean dynamic
- Type is decided at assignment
- After that, type is fixed

Flutter Habit:
- Use var when type is obvious
- Use explicit type for clarity
*/
