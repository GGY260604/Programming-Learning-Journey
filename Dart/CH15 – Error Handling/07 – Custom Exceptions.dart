/*
-------------------------------------
       Dart - Custom Exceptions
-------------------------------------

Create your own exception types
to express intent clearly.
*/

class InvalidAgeException implements Exception {
  final String message;

  InvalidAgeException(this.message);

  @override
  String toString() => message;
}

void checkAge(int age) {
  if (age < 0) {
    throw InvalidAgeException("Age must be >= 0");
  }
}

void main() {
  try {
    checkAge(-1);
  } catch (e) {
    print(e);
  }
}

/*
Benefits:
- clearer intent
- easier error handling
*/
