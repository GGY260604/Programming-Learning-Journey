/*
-------------------------------------
    final + Constructor Discipline
-------------------------------------

final fields enforce immutability.

Once set in constructor:
- they cannot be changed
- object is always in a valid state
*/

class Profile {
  final String username;
  final String email;

  Profile({
    required this.username,
    required this.email,
  });
}

void main() {
  Profile p = Profile(
    username: "galen",
    email: "galen@example.com",
  );

  print(p.username);
}

/*
Flutter habit:
- make fields final by default
- allow mutation ONLY when necessary
*/
