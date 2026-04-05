/*
-------------------------------------
      Dart - Why Extensions Exist
-------------------------------------

Problem:
You want to add functionality to a type
WITHOUT modifying the original class.

You CANNOT:
- change String
- change int
- change List

Extensions solve this.
*/

extension StringExtras on String {
  bool get isEmail {
    return contains("@") && contains(".");
  }
}

void main() {
  print("test@example.com".isEmail);
  print("hello".isEmail);
}

/*
-------------------------------------
Key idea
-------------------------------------

Extensions:
- add methods
- add getters
- do NOT add state
*/
