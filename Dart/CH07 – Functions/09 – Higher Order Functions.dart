/*
-------------------------------------
    Dart - Higher Order Functions
-------------------------------------

Functions that:
- accept functions
- return functions
*/

void execute(Function action) {
  action();
}

void main() {
  execute(() {
    print("Action executed");
  });
}

/*
Important:
- Functions are first-class objects in Dart
*/
