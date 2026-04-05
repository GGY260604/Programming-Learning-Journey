/*
-------------------------------------
   Dart - dynamic vs Object vs var
-------------------------------------

These are NOT the same.
Understanding this prevents bugs.
*/

void main() {

  var a = 10;          // inferred as int
  // a = "text";       // ERROR

  dynamic b = 10;
  b = "text";          // allowed
  b = true;            // allowed

  Object c = 10;
  c = "text";          // allowed
  c = true;            // allowed

  print(a);
  print(b);
  print(c);
}

/*
Key Differences:

var:
- type inferred once
- type-safe

dynamic:
- disables type checking
- dangerous if overused

Object:
- base type of all objects
- still type-safe

Rule:
- Avoid dynamic unless necessary
*/
