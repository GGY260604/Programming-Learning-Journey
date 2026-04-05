/*
-------------------------------------
          Dart - ! and ?.
-------------------------------------

These operators handle nullable values.
*/

void main() {
  /*
  String? name;

  // Safe access (no crash)
  print(name?.length);

  // Assign later
  name = "Galen";

  // Null assertion (safe now)
  print(name!.length);
  */

  /*
  WARNING:
  If name is null, name! causes runtime error
  */
}

/*
Rules:
?.  → safe, returns null if value is null
!   → unsafe, use only when certain
*/
