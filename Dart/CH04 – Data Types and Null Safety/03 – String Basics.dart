/*
-------------------------------------
       Dart - String Basics
-------------------------------------

String represents text.
Dart Strings are immutable.
*/

void main() {
  String firstName = "Galen";
  String lastName = 'Gui';   // single quotes also allowed

  print(firstName);
  print(lastName);

  print(firstName + " " + lastName);
  print("$firstName $lastName");
}

/*
Important:
- Strings cannot be modified in-place
- Any change creates a new String object

Flutter usage:
- Text widgets
- Labels
- Messages
*/
