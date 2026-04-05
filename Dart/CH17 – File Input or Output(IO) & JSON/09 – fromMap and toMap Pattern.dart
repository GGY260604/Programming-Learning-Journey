/*
-------------------------------------
       fromMap / toMap Pattern
-------------------------------------

This is the MOST IMPORTANT pattern
for JSON + Flutter.
*/

class User {
  final String name;
  final int age;
  final bool isStudent;

  User({
    required this.name,
    required this.age,
    required this.isStudent,
  });

  // Convert Map → Object
  factory User.fromMap(Map<String, dynamic> map) {
    return User(
      name: map["name"],
      age: map["age"],
      isStudent: map["isStudent"],
    );
  }

  // Convert Object → Map
  Map<String, dynamic> toMap() {
    return {
      "name": name,
      "age": age,
      "isStudent": isStudent,
    };
  }
}

void main() {
  Map<String, dynamic> jsonMap = {
    "name": "Galen",
    "age": 22,
    "isStudent": true,
  };

  User user = User.fromMap(jsonMap);
  print(user.name);

  print(user.toMap());
}

/*
Flutter usage:
- API responses
- local storage
- state management
*/
