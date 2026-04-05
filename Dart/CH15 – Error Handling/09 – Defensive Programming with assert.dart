/*
-------------------------------------
       Dart - Defensive Programming
-------------------------------------

assert checks assumptions DURING development.
*/

void setAge(int age) {
  assert(age >= 0, "Age must not be negative");
}

void main() {
  setAge(-1);
}

/*
Important:
- assert runs only in debug mode
- ignored in production builds
*/
