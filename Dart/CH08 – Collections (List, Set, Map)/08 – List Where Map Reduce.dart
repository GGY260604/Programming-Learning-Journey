/*
-------------------------------------
      Dart - where, map, reduce
-------------------------------------

Used for filtering and transforming data.
*/

void main() {
  List<int> numbers = [1, 2, 3, 4, 5];

  var even = numbers.where((n) => n.isEven).toList();
  var squared = numbers.map((n) => n * n).toList();
  var sum = numbers.reduce((a, b) => a + b);

  print(even);
  print(squared);
  print(sum);
}

/*
Flutter usage:
- filtering UI data
- transforming lists into widgets
*/
