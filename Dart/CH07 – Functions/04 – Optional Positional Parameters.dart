/*
-------------------------------------
Dart - Optional Positional Parameters
-------------------------------------

Wrapped in [].
*/

void showInfo(String name, [int? age]) {
  print("Name: $name, Age: $age");
}

void main() {
  showInfo("Galen");
  showInfo("Galen", 22);
}

/*
Note:
- Optional positional parameters are nullable by default
*/
