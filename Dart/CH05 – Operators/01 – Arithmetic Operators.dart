/*
-------------------------------------
      Dart - Arithmetic Operators
-------------------------------------

Used for mathematical calculations.
*/

void main() {
  int a = 10;
  int b = 3;

  print(a + b); // addition
  print(a - b); // subtraction
  print(a * b); // multiplication
  print(a / b); // division (returns double)
  print(a ~/ b); // integer division
  print(a % b); // remainder (modulus)
}

/*
Output:
13
7
30
3.3333333333333335
3
1

Note:
- / always returns double
- ~/ is integer division (VERY Dart-specific)
*/
