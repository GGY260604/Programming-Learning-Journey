/*
-------------------------------------
       Async Error Handling
-------------------------------------

Exceptions in async code
are caught using try-catch.
*/

Future<void> riskyOperation() async {
  throw Exception("Something went wrong");
}

Future<void> main() async {
  try {
    await riskyOperation();
  } catch (e) {
    print("Caught: $e");
  }
}

/*
Careless mistake ❌
Using try-catch WITHOUT await
→ exception not caught
*/
