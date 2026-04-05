/*
-------------------------------------
          Dart - ?? and ??=
-------------------------------------

Used to provide default values.
*/

void main() {
  String? input;

  String result = input ?? "Default value";
  print(result);

  input ??= "Assigned now";
  print(input);
}

/*
??   → use fallback value
??=  → assign only if null

Flutter usage:
- default text
- fallback UI values
*/
