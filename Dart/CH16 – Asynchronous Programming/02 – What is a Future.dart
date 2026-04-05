/*
-------------------------------------
       Dart - What is a Future
-------------------------------------

A Future represents a VALUE
that will be available LATER.

Think of it as:
- a promise
- a placeholder for a result
*/

Future<String> fetchData() {
  return Future.delayed(
    Duration(seconds: 2),
    () => "Data loaded",
  );
}

void main() {
  Future<String> result = fetchData();
  print(result); // NOT the data
}

/*
Important:
- Future<String> ≠ String
- You must WAIT for the value
*/
