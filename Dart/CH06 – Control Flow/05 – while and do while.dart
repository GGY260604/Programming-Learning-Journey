/*
-------------------------------------
       Dart - while and do-while
-------------------------------------

Used when iterations depend on a condition.
*/

void main() {
  int count = 0;

  while (count < 3) {
    print("while count = $count");
    count++;
  }

  int value = 0;

  do {
    print("do-while value = $value");
    value++;
  } while (value < 3);
}

/*
Difference:
- while checks before running
- do-while runs at least once
*/
