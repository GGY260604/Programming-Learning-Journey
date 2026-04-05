/*
-------------------------------------
       lib/ Directory
-------------------------------------

lib/ is the PUBLIC API of your package.

Anything inside lib/ can be imported using:
package:<package_name>/...

Assume package name in pubspec.yaml:
name: user_app

Project structure:

lib/
├── models/
│   └── user.dart
├── services/
│   └── user_service.dart
├── utils/
│   └── json_helper.dart
└── main.dart


Example files:

lib/models/user.dart
--------------------
class User {
  final String name;
  final int age;

  User(this.name, this.age);
}


lib/utils/json_helper.dart
--------------------------
import 'dart:convert';

Map<String, dynamic> parseJson(String json) {
  return jsonDecode(json);
}


lib/services/user_service.dart
------------------------------
import 'package:user_app/models/user.dart';
import 'package:user_app/utils/json_helper.dart';

class UserService {
  User getUser(String json) {
    final data = parseJson(json);
    return User(data['name'], data['age']);
  }
}


lib/main.dart
-------------
import 'package:user_app/services/user_service.dart';

void main() {
  final service = UserService();
  final user = service.getUser('{"name":"Galen","age":22}');
  print(user.name);
}

Key rule:
- Do NOT use relative imports inside lib/
- Always use package:<package_name>/...
*/
void main() {}
