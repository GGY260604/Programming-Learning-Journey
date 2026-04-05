/*
-------------------------------------
           Encoding JSON
-------------------------------------

Convert Dart Map/List → JSON text
*/

import 'dart:convert';

void main() {
  Map<String, dynamic> user = {
    "name": "Galen",
    "age": 22,
    "isStudent": true,
  };

  String jsonText = jsonEncode(user);
  print(jsonText);
}
