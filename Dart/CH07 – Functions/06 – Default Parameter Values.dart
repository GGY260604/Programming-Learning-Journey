/*
-------------------------------------
   Dart - Default Parameter Values
-------------------------------------

Provides fallback values.
*/

void showProfile({String role = "User"}) {
  print("Role: $role");
}

void main() {
  showProfile();
  showProfile(role: "Admin");
}
