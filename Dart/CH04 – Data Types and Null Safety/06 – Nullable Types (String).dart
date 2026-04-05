/*
-------------------------------------
       Dart - Nullable Types
-------------------------------------

Adding ? allows null.
*/

void main() {
  String? email;
  int? age;

  print(email); // null
  print(age);   // null

  email = "test@example.com";
  print(email);
}

/*
Rule:
Type      → cannot be null
Type?     → can be null

Examples:
String   vs String?
int      vs int?
*/
