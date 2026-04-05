/*
-------------------------------------
      Dart - Common String Methods
-------------------------------------

String provides many built-in methods.
Strings are immutable.
*/

void main() {
  String text = "  Hello Dart  ";

  print(text.length);
  print(text.toUpperCase());
  print(text.toLowerCase());
  print(text.trim());
  print(text.contains("Dart"));
  print(text.replaceAll("Dart", "World"));
}

/*
Important:
- trim() removes leading/trailing spaces
- replaceAll() returns a NEW string
*/
