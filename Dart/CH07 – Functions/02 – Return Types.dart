/*
-------------------------------------
    Dart - Function Return Types
-------------------------------------

Functions can return values.
*/

int add(int a, int b) {
  return a + b;
}

void main() {
  int result = add(3, 5);
  print(result);
}

/*
Rules:
- Return type must match function type
- return exits the function
*/
