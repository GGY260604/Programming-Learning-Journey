/*
-------------------------------------
      Dart - break and continue
-------------------------------------

Used to control loop flow.
*/

void main() {
  for (int i = 0; i < 5; i++) {

    if (i == 2) {
      continue; // skip this iteration
    }

    if (i == 4) {
      break; // exit loop
    }

    print(i);
  }
}

/*
Output:
0
1
3

Flutter usage:
- skipping invalid data
- early termination
*/
