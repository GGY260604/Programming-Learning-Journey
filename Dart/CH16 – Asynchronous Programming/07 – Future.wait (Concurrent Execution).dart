/*
-------------------------------------
            Future.wait
-------------------------------------

Run multiple Futures concurrently.
*/

Future<int> task1() async {
  await Future.delayed(Duration(seconds: 1));
  return 1;
}

Future<int> task2() async {
  await Future.delayed(Duration(seconds: 1));
  return 2;
}

Future<void> main() async {
  List<int> results = await Future.wait([
    task1(),
    task2(),
  ]);

  print(results);
}

/*
Use when:
- tasks are independent
- you want maximum performance
*/
