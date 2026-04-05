/*
-------------------------------------
            Decoding JSON
-------------------------------------

Convert JSON text → Dart Map/List
*/

import 'dart:convert';

void main() {
  String jsonText = '''
  {
    "name": "Galen",
    "age": 22,
    "isStudent": true
  }
  ''';

  Map<String, dynamic> data = jsonDecode(jsonText);

  print(data["name"]);
  print(data["age"]);
}

/*
Careless mistake ❌
Assuming jsonDecode returns a custom object
(it returns Map or List)
*/
