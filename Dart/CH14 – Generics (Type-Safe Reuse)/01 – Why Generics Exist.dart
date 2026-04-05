/*
-------------------------------------
       Dart - Why Generics Exist
-------------------------------------

Problem:
We want reusable code,
BUT we still want type safety.

Without generics, we often use Object or dynamic.
This removes compiler protection.
*/

void main() {
  List items = [1, "text", true]; // ❌ unsafe

  // Compiler allows this,
  // but logic errors appear later.
  print(items[0] + items[1]); // runtime error
}

/*
Generics solve this by:
- locking types early
- catching errors at compile time
*/
