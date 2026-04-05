/*
-------------------------------------
        Dart - switch (classic)
-------------------------------------

switch compares ONE value against cases.
*/

void main() {
  String day = "Monday";

  switch (day) {
    case "Monday":
      print("Start of week");
      break;
    case "Sunday":
      print("End of week");
      break;
    default:
      print("Midweek");
  }
}

/*
Rules:
- Each case must end with break
- default handles unmatched cases
*/
