/*
-------------------------------------
      Dart - Core Numeric Types
-------------------------------------

Dart has three main numeric types:
- int    → whole numbers
- double → decimal numbers
- num    → parent type of int and double
*/

void main() {
  int count = 10;
  double price = 9.99;

  num total1 = 5;     // int
  num total2 = 5.75;  // double

  print(count);
  print(price);
  print(total1);
  print(total2);
}

/*
Notes:
- int and double are subclasses of num
- Use int/double when possible
- num is useful when value may vary

Flutter usage:
- screen sizes → double
- indexes / counts → int
*/
