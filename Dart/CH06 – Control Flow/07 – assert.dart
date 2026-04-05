/*
-------------------------------------
       Dart - assert
-------------------------------------

Used to catch programming errors early.
*/

void main() {
  int age = 20;

  assert(age >= 0, "Age cannot be negative");

  print("Age is valid");
}

/*
Important:
- assert runs only in debug mode
- ignored in production

Flutter usage:
- validating widget inputs
- debugging layout constraints
*/
