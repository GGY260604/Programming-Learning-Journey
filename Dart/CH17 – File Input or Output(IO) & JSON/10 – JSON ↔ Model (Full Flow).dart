/*
-------------------------------------
       JSON ↔ Model Full Flow
-------------------------------------
*/

import 'dart:convert';

class User {
  final String name;
  final int age;

  User(this.name, this.age);

  // factory constructor allows returning an instance
  factory User.fromJson(String json) {
    Map<String, dynamic> map = jsonDecode(json);
    return User(map["name"], map["age"]);
  }

  String toJson() {
    return jsonEncode({
      "name": name,
      "age": age,
    });
  }
}

void main() {
  String jsonText = '{"name":"Galen","age":22}';

  User u = User.fromJson(jsonText);
  print(u.name);

  print(u.toJson());
}
