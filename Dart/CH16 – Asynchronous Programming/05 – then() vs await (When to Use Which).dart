/*
-------------------------------------
           then() vs await
-------------------------------------

Both are correct.
Choose based on readability.
*/

Future<int> getNumber() async {
  return 5;
}

void usingThen() {
  getNumber().then((value) {
    print("then: $value");
  });
}

Future<void> usingAwait() async {
  int value = await getNumber();
  print("await: $value");
}

void main() {
  usingThen();
  usingAwait();
}

/*
Rule of thumb:
- await → procedural logic
- then() → chaining / functional style

Flutter prefers await.
*/
