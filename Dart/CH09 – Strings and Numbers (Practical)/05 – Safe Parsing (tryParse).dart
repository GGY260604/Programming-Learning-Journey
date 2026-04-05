/*
-------------------------------------
       Dart - Safe Parsing
-------------------------------------

tryParse prevents runtime errors.
*/

void main() {
  String input = "abc";

  int? value = int.tryParse(input);

  if (value == null) {
    print("Invalid number");
  } else {
    print(value);
  }
}

/*
Flutter usage:
- form validation
- user input handling
*/
