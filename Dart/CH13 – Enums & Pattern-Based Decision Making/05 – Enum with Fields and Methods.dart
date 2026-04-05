/*
-------------------------------------
  Dart - Enum with Fields & Methods
-------------------------------------

Modern Dart enums can:
- have fields
- have constructors
- have methods
*/

enum Role {
  // Each enum value has a label field for constructor argument
  admin("Admin User"),
  user("Normal User"),
  guest("Guest User");

  final String label;

  const Role(this.label);

  bool get isAdmin => this == Role.admin;
}

void main() {
  Role r = Role.admin;

  print(r.label);
  print(r.isAdmin);
}

/*
Important:
- enum constructors are ALWAYS const
- fields must be final

Flutter usage:
- labels
- permissions
- UI logic
*/
