/*
-------------------------------------
     Dart - Positional Parameters
-------------------------------------

Parameters passed by position.
Order matters.
*/

void showInfo(String name, int age) {
  print("Name: $name, Age: $age");
}

void main() {
  showInfo("Galen", 22);
}

/*
Problem:
- Easy to mix up parameters
- Hard to read when many parameters exist
*/
