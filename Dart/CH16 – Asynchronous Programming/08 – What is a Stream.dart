/*
-------------------------------------
       Dart - What is a Stream
-------------------------------------

Future:
- produces ONE value

Stream:
- produces MULTIPLE values over time
*/

Stream<int> countStream() async* {
  for (int i = 1; i <= 3; i++) {
    await Future.delayed(Duration(seconds: 1));
    yield i;
  }
}

void main() async {
  await for (int value in countStream()) {
    print(value);
  }
}

/*
Key idea:
Future  → single async result
Stream  → sequence of async results
*/
