/*
-------------------------------------
          Dart - else if
-------------------------------------

Used for multiple conditions.
*/

void main() {
  int score = 75;

  if (score >= 80) {
    print("Grade A");
  } else if (score >= 60) {
    print("Grade B");
  } else {
    print("Fail");
  }
}

/*
Important:
- Conditions are checked top to bottom
- First match wins
*/
