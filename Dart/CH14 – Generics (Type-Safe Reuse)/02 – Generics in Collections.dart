/*
-------------------------------------
          Dart - List<T>
-------------------------------------

List<T> means:
- This list can ONLY store type T
*/

void main() {
  List<int> numbers = [1, 2, 3];

  // numbers.add("four"); // ❌ compile-time error

  numbers.add(4);
  print(numbers);
}

/*
Key idea:
T is a TYPE PLACEHOLDER.
*/
