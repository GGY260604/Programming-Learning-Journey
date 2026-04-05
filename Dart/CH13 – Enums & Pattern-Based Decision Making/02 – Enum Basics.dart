/*
-------------------------------------
       Dart - Enum Basics
-------------------------------------

An enum defines a FIXED set of values.
*/

enum Status {
  loading,
  success,
  error,
}

void main() {
  Status s = Status.loading;

  print(s);
  print(s.name); // Dart 2.15+
}

/*
Key properties:
- enum values are constants
- no invalid values allowed
- comparison is type-safe

Careless mistake ❌
Using String instead of enum for states
*/
