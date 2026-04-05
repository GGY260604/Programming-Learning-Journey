/*
-------------------------------------
       Extension Name Conflicts
-------------------------------------

Extensions can conflict.
Dart resolves them explicitly.
*/

extension A on String {
  String shout() => toUpperCase();
}

extension B on String {
  String shout() => "!!! ${toUpperCase()} !!!";
}

void main() {
  print(A("hello").shout());
  print(B("hello").shout());
}

/*
Careless mistake ❌
Relying on implicit resolution when conflicts exist
*/
