/*
-------------------------------------
    Dart - Increment and Decrement
-------------------------------------

Used to increase or decrease numbers.
*/

void main() {
  int count = 0;

  count++; // postfix increment
  print(count);

  ++count; // prefix increment
  print(count);

  print(count--); // prints then decrements
  print(--count); // decrements then prints
}

/*
Note:
- ++ and -- behave like C++ / Java
- Common in loops and counters
*/
