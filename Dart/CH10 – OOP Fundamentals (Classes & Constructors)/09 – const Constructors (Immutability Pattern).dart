/*
-------------------------------------
       OOP - const Constructor
-------------------------------------

const constructor allows compile-time constant objects.

Rules:
- All fields must be final
- Constructor must be const
- Arguments must be compile-time constants to create a const instance

Flutter uses const a lot for performance and immutability.
*/

class Point {
  final int x;
  final int y;

  const Point(this.x, this.y);
}

void main() {
  const p1 = Point(1, 2);
  const p2 = Point(1, 2);

  print(identical(p1, p2)); // true (same canonical const instance)
}

/*
Common careless mistake ❌
- Non-final fields in const class:
  int x; // not allowed if constructor is const
*/
