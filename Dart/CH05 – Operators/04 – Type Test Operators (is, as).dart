/*
-------------------------------------
      Dart - Type Test Operators
-------------------------------------

Used to check or cast types safely.
*/

void main() {
  Object value = "Hello Dart";

  if (value is String) {
    print("Length: ${value.length}");
  }

  /*
  as operator:
  - forces casting
  - throws error if wrong
  */

  String text = value as String;
  print(text.toUpperCase());
}

/*
Rules:
- Prefer 'is' for safety
- Use 'as' only when certain

Flutter usage:
- working with Object or dynamic values
*/
