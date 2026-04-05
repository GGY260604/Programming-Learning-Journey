/*
-------------------------------------
       Dart - Number Formatting
-------------------------------------
*/

void main() {
  double price = 12.34567;
  
  print(price); // 12.34567
  print(price.toString());
  print(price.toStringAsFixed(2)); // 12.35
  print(price.toStringAsPrecision(5)); // 12.346
}

/*
Flutter usage:
- currency display
- UI formatting
*/
