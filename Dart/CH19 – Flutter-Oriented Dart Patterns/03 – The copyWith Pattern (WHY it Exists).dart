/*
-------------------------------------
       copyWith Pattern (WHY)
-------------------------------------

Problem:
With immutable objects, how do we "update" one field?

Answer:
- create a new object
- copy old values
- override only what changes

This is copyWith.
*/

class User {
  final String name;
  final int age;

  User({
    required this.name,
    required this.age,
  });

  User copyWith({
    String? name,
    int? age,
  }) {
    return User(
      name: name ?? this.name,
      age: age ?? this.age,
    );
  }
}

void main() {
  User u1 = User(name: "Galen", age: 22);

  User u2 = u1.copyWith(age: 23);

  print(u1.age); // 22
  print(u2.age); // 23
}

/*
Key idea:
- u1 is NOT modified
- u2 is a NEW object

Flutter uses this pattern EVERYWHERE.

-------------------------------------
      copyWith Careless Mistakes
-------------------------------------

❌ Modifying fields inside copyWith
❌ Forgetting nullable parameters
❌ Returning this instead of new object
❌ Using copyWith on mutable classes

Rule:
copyWith MUST:
- return a NEW object
- preserve immutability
*/