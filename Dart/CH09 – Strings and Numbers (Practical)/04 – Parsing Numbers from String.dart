/*
-------------------------------------
       Dart - Parsing Numbers
-------------------------------------

Convert String to number types.
*/

void main() {
  String intText = "42";
  String doubleText = "3.14";

  int a = int.parse(intText);
  double b = double.parse(doubleText);

  print(a);
  print(b);
}

/*
Warning:
- parse throws error if string is invalid
*/
