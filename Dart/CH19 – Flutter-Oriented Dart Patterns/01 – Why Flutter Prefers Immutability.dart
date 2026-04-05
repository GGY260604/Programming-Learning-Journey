/*
-------------------------------------
      Why Immutability Matters
-------------------------------------

Immutability means:
- Once an object is created,
- its data NEVER changes.

Instead of modifying an object,
we CREATE A NEW ONE.

Flutter prefers immutability because:
- UI rebuilds are predictable
- bugs are easier to reason about
- state changes are explicit
*/

class User {
  final String name;
  final int age;

  User(this.name, this.age);
}

void main() {
  User u1 = User("Galen", 22);

  // u1.age = 23; // ❌ not allowed

  User u2 = User("Galen", 23); // new object

  print(u1.age);
  print(u2.age);
}

/*
Mental shift (VERY important):

❌ "Change the object"
✅ "Replace the object"
*/
