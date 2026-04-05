/*
This is how you would use an external package, e.g. 'http'.

Steps:
1) Create project (if not yet):
      dart create my_app
      cd my_app

2) Add http:
      dart pub add http

3) Then run:
      dart run
*/

import 'package:http/http.dart' as http;

Future<void> fetchExample() async {
  var url = Uri.parse("https://example.com");
  var response = await http.get(url);
  print("Status: ${response.statusCode}");
}

void main() async {
  await fetchExample();
}