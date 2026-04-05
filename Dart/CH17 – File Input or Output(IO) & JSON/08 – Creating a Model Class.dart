/*
-------------------------------------
       Creating a Model Class
-------------------------------------

Model classes represent structured data.
*/

class User {
  final String name;
  final int age;
  final bool isStudent;

  User({
    required this.name,
    required this.age,
    required this.isStudent,
  });
}

void main() {
  User u = User(name: "Galen", age: 22, isStudent: true);
  print(u.name);
}
