/*
-------------------------------------
       Dart - Using then()
-------------------------------------

then() registers a callback
to run AFTER the Future completes.
*/

Future<String> fetchData() {
  return Future.delayed(
    Duration(seconds: 1),
    () => "Hello",
  );
}

void main() {
  fetchData().then((value) {
    print(value);
  });

  print("This runs first");
}

/*
Execution order:
1) main continues
2) Future completes later
3) then() callback runs

Careless mistake ❌
Expecting synchronous order
*/
