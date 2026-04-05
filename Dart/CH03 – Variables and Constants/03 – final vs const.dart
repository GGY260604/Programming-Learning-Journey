/*
-------------------------------------
       Dart - final vs const
-------------------------------------

This file explains final and const WITHOUT jargon.

Key idea:
Both prevent reassignment.
Difference is WHEN the value is decided.
*/

void main() {

  /*
  -------------------------------------
  final: value decided when program runs
  -------------------------------------
  */

  final currentYear = DateTime.now().year;
  print(currentYear);

  // currentYear = 2026; // ERROR


  /*
  -------------------------------------
  const: value must already be known
  -------------------------------------
  */

  const pi = 3.14159;
  const appName = "MyApp";

  print(pi);
  print(appName);

  // const now = DateTime.now(); // ERROR
}

/*
Beginner Decision Rule:

If value depends on:
- time
- input
- API
- database

→ use final

If value is:
- fixed
- predictable
- configuration

→ use const

Flutter Rule:
- Prefer final
- Use const whenever possible
*/
