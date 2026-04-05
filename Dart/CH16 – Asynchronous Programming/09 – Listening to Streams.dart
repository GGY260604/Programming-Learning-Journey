/*
-------------------------------------
            Stream.listen           
-------------------------------------

listen() registers callbacks for stream events.

Basic syntax:
stream.listen(
  (data) {
    handle data event
  },
  onError: (error) {
    handle error event
  },
  onDone: () {
    handle done event
  },
  cancelOnError: false, // stop listening on first error
);
*/

Stream<int> countStream() async* {
  yield 1;
  yield 2;
  yield 3;
}

void main() {
  countStream().listen(
    (value) {
      print("Data: $value");
    },
    onDone: () {
      print("Stream completed");
    },
  );
}

/*
Flutter usage:
- StreamBuilder
- real-time updates
*/
