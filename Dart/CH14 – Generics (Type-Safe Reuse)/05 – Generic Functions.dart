/*
-------------------------------------
       Dart - Generic Functions
-------------------------------------

Generic functions work with ANY type,
while remaining type-safe.
*/

T first<T>(List<T> items) {
  return items[0];
}

void main() {
  print(first<int>([1, 2, 3]));
  print(first<String>(["a", "b", "c"]));

  /*
  Dart can infer T automatically:
  */
  print(first([true, false]));
}

/*
Key idea:
- <T> declares a type parameter
- T behaves like a real type
*/
