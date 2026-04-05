/*
-------------------------------------
    OOP - Default Parameter Values
-------------------------------------

Constructors can use optional named parameters
with default values.

This style is VERY common in Flutter widgets.
*/

class Person {
  final String name;
  final int age;
  final String role;

  Person({
    required this.name,
    this.age = 18,          // default value
    this.role = "User",     // default value
  });

  void introduce() {
    print("Name: $name, Age: $age, Role: $role");
  }
}

void main() {
  Person(name: "Galen").introduce();
  Person(name: "Galen", age: 22, role: "Admin").introduce();
}

/*
Constraints:
- If a field must ALWAYS be provided, mark it required
- Defaults must be compile-time constants (usually fine for primitives)

Common careless mistake ❌
- Forgetting required:
  Person({this.name}); // name becomes nullable or forces late — messy
*/
