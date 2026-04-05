/*
-------------------------------------
       Dart - try and catch
-------------------------------------

Used to handle runtime exceptions safely.
*/

void main() {
  try {
    int value = int.parse("abc"); // invalid
    print(value);
  } catch (e) {
    print("Error occurred: $e");
  }
}

/*
Behavior:
- Code inside try may throw
- catch runs ONLY if exception occurs
- Program continues instead of crashing
*/
