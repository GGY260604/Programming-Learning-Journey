/*
-------------------------------------
       Dart - Named Parameters
-------------------------------------

Parameters are passed by name.
Order does NOT matter.
*/

void showProfile({required String name, required int age}) {
  print("Name: $name, Age: $age");
}

void main() {
  showProfile(age: 22, name: "Galen");
}

/*
Flutter uses named parameters EVERYWHERE.
*/
