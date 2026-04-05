/*
-------------------------------------
          Dart - Map Basics          
-------------------------------------

Map:
- Key-value pairs
*/

void main() {
  Map<String, dynamic> user = {
    "name": "Galen",
    "age": 22,
    "isStudent": true,
  };

  print(user["name"]);
  print(user.keys);
  print(user.values);
}

/*
Flutter usage:
- JSON data
- configuration
*/
