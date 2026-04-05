/*
-------------------------------------
    Dart - String Interpolation
-------------------------------------

String interpolation:
- Insert variables directly into strings
- Cleaner than concatenation
*/

void main() {

  String name = "Galen";
  int age = 22;

  /*
  Old style (not recommended):
  */
  print("Name: " + name + ", Age: " + age.toString());

  /*
  Dart style (recommended):
  */
  print("Name: $name, Age: $age");

  /*
  Expressions need braces:
  */
  print("Age next year: ${age + 1}");
}

/*
Rules:
- $variable for simple variables
- ${expression} for calculations
- Works in Flutter widget text everywhere
*/
