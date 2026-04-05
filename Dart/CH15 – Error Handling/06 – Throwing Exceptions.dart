/*
-------------------------------------
           Dart - throw
-------------------------------------

You can throw exceptions yourself.
*/

void checkAge(int age) {
  if (age < 0) {
    throw Exception("Age cannot be negative");
  }
}

void main() {
  try {
    checkAge(-5);
  } catch (e) {
    print(e);
  }
}

/*
Throw when:
- input is invalid
- operation cannot continue
*/
