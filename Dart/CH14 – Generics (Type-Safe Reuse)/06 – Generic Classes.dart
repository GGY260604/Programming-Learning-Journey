/*
-------------------------------------
       Dart - Generic Classes
-------------------------------------

Generic classes store or process
data of a specific type.
*/

class Box<T> {
  T value;

  Box(this.value);

  T get A => value;
}

void main() {
  Box<int> intBox = Box(10);
  Box strBox = Box("Hello"); // Dart infers T as String

  print(intBox.A);
  print(strBox.A);
}

/*
Flutter usage:
- repositories
- response wrappers
- state containers
*/
