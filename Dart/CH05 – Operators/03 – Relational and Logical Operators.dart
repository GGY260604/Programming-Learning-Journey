/*
-------------------------------------
       Dart - Relational and Logical Operators
-------------------------------------

Used in conditions and decision making.
*/

void main() {
  int age = 20;

  print(age > 18);   // true
  print(age >= 21);  // false
  print(age == 20);  // true
  print(age != 30);  // true

  bool isStudent = true;
  bool hasDiscount = false;

  print(isStudent && hasDiscount); // AND
  print(!isStudent || hasDiscount); // OR
  print(!isStudent);               // NOT
}

/*
Very common in:
- if conditions
- visibility logic
- validation checks
*/
