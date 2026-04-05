/*
-------------------------------------
       OOP - Static Members
-------------------------------------

Static members belong to the CLASS,
not to individual objects.
*/

class Counter {
  static int count = 0;

  Counter() {
    count++;
  }
}

void main() {
  Counter();
  Counter();
  Counter();

  print(Counter.count);
}

/*
Static data:
- shared across all objects
- exists even if no object exists

Used for:
- constants
- shared configuration
*/
