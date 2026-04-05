/*
-------------------------------------
  Dart - Keywords and Identifiers
-------------------------------------

Keywords:
- Reserved words with special meaning
- Cannot be used as variable or function names

Identifiers:
- Names given to variables, functions, classes
*/

void main() {

  /*
  Examples of VALID identifiers:
  */
  int age = 20;
  String userName = "Galen";
  double _score = 95.5;
  bool isActive = true;

  print(age);
  print(userName);
  print(_score);
  print(isActive);

  /*
  Examples of INVALID identifiers (do NOT uncomment):
  
  int 1number = 10;     // Cannot start with number
  String class = "A";  // 'class' is a keyword
  double my-score = 5; // '-' not allowed
  */

}

/*
Naming Rules:
- Must start with letter or underscore (_)
- Cannot start with number
- Cannot use keywords
- Case-sensitive (age ≠ Age)

Flutter Habit:
- camelCase for variables and functions
- PascalCase for classes
*/
