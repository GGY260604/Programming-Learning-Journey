/*
-------------------------------------
       Dart - async / await
-------------------------------------

async/await makes async code
look like synchronous code.
*/

Future<String> fetchData() async {
  await Future.delayed(Duration(seconds: 1));
  return "Hello";
}

Future<void> main() async {
  print("Before await");

  String data = await fetchData();
  print(data);

  print("After await");
}

/*
Rules:
- await can ONLY be used inside async functions
- await pauses ONLY the current function
- UI / other code continues running
*/
