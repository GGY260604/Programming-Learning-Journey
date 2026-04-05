/*
-------------------------------------
        Equality & hashCode
-------------------------------------

By default:
== compares OBJECT ID, not content.

This causes subtle bugs in Flutter.
*/

class User {
  final String name;
  final int age;

  User(this.name, this.age);
}

void main() {
  User u1 = User("Galen", 22);
  User u2 = User("Galen", 22);

  print(u1 == u2); // false ❌
}
