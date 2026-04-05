/*
-------------------------------------
          Proper Equality
-------------------------------------

We override:
- ==
- hashCode

So objects compare by VALUE, not by memory reference.

IMPORTANT:
- == and hashCode MUST be overridden together
- This is a language contract in Dart
*/

class User {
  final String name;
  final int age;

  User(this.name, this.age);

  /*
  Override == :
  - Defines logical equality
  - Two User objects are considered equal
    if their fields (name, age) are equal
  */
  @override
  bool operator ==(Object other) {
    return other is User &&
        other.name == name &&
        other.age == age;
  }

  /*
  Override hashCode :
  - hashCode is used internally by hash-based collections
    (Set, Map, HashMap, LinkedHashSet)
  - Objects that are equal using == MUST have the same hashCode
  - If hashCode is NOT overridden:
      * u1 == u2 may be true
      * but Set / Map may treat them as different objects
  - Object.hash(...) combines fields that define equality
    so equal objects end up in the same hash bucket
  */
  @override
  int get hashCode => Object.hash(name, age);
}

void main() {
  User u1 = User("Galen", 22);
  User u2 = User("Galen", 22);

  print(u1 == u2); // true ✅
}

/*
Flutter relies on correct equality for:
- rebuild optimizations (Widget diffing)
- collections (Set / Map behavior)
- state comparison (Bloc, Provider, Riverpod, etc.)

Rule to remember:
If you override ==, ALWAYS override hashCode.
*/
