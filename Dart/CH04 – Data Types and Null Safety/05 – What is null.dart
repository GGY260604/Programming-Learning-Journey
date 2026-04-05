/*
-------------------------------------
       Dart - What is null
-------------------------------------

null means:
- no value
- absence of data
*/

void main() {

  // String name = null; // ERROR (null safety)

  String? name = null; // allowed

  print(name);
}

/*
Important:
- In Dart, variables are non-nullable by default
- You must explicitly allow null

This is called:
"Sound Null Safety"
*/
