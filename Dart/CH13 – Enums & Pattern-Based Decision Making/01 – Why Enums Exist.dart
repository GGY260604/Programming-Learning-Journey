/*
-------------------------------------
       Dart - Why Enums Exist
-------------------------------------

Problem:
Sometimes a variable should only have
ONE value from a SMALL FIXED SET.

Bad approach ❌:
- using String
- using int codes

These allow INVALID values silently.
*/

void main() {
  String status = "loading";

  // This compiles but is logically wrong
  status = "lodading"; // typo, no error 

  print(status);
}

/*
Enums solve this by:
- restricting possible values
- catching mistakes at compile time
*/
