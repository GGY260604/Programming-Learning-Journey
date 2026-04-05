/*
-------------------------------------
         async* and yield
-------------------------------------

Used to create streams.
*/

Stream<String> messages() async* {
  yield "Hello";
  yield "Welcome";
  yield "Goodbye";
}

void main() async {
  await for (var msg in messages()) {
    print(msg);
  }
}

/*
Rules:
- async  → returns Future
- async* → returns Stream
- yield  → emits value into stream
*/
