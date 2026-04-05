/*
-------------------------------------
       Dart - late Keyword
-------------------------------------

Problem:
- Variable must be declared first
- Value assigned later
- But NOT nullable

late solves this.
*/

late String userName;

void main() {

  /*
  Variable declared earlier,
  but value assigned later.
  */

  userName = "Galen";
  print(userName);
}

/*
Important:
- late promises the value WILL be set
- Accessing before assignment causes runtime error

Flutter Usage:
- late variables in State classes
*/
