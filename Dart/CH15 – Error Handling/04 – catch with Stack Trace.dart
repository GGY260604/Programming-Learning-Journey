/*
-------------------------------------
         Dart - Stack Trace
-------------------------------------

Stack trace shows WHERE the error happened.
*/

void main() {
  try {
    int.parse("abc");
  } catch (e, stackTrace) {
    print("Error: $e");
    print("StackTrace:");
    print(stackTrace);
  }
}

/*
Flutter usage:
- logging
- debugging crashes
*/
