/*
-------------------------------------
     Dart - Collection if and for
-------------------------------------

Allows logic inside collections.
*/

void main() {
  bool isAdmin = true;

  List<String> menu = [
    "Home",
    if (isAdmin) "Admin Panel",
    "Profile",
  ];

  print(menu);

  List<int> numbers = [1, 2, 3];

  List<int> doubled = [
    for (var n in numbers) n * 2
  ];

  print(doubled);
}

/*
VERY IMPORTANT for Flutter UI building.
*/
