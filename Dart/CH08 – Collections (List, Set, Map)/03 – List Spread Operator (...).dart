/*
-------------------------------------
    Dart - Spread Operator (...)
-------------------------------------

Used to merge lists.
*/

void main() {
  List<int> a = [1, 2];
  List<int> b = [3, 4];

  List<int> combined = [...a, ...b];

  print(combined);
}

/*
Flutter usage:
- combining widget lists
*/
