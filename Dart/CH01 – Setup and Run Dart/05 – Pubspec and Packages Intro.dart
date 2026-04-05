/*
-------------------------------------
  Dart - Pubspec and Packages Intro
-------------------------------------

In Dart (and Flutter), we rarely build everything ourselves.

We usually use:
- Packages (libraries) made by other developers
- Official packages maintained by teams

To manage packages, Dart uses:
- pub (package manager)
- pubspec.yaml (project configuration file)

This file explains:
1) What pubspec.yaml is
2) What a package is
3) How to add a package
4) How to import and use packages
5) Difference between Dart project and Flutter project
*/

import 'dart:math';     // Core library (built-in)
import 'dart:convert';  // Core library (built-in)

void main() {
  /*
  -------------------------------------
  1) What is pubspec.yaml?
  -------------------------------------

  pubspec.yaml is the "project configuration" file.

  It tells Dart/Flutter:
  - project name
  - SDK version requirement
  - dependencies (packages you want)
  - dev_dependencies (tools for development/testing)
  - (Flutter only) assets and fonts

  Important:
  - YAML is indentation-sensitive
  - Use 2 spaces indentation (common practice)
  - Tabs can break YAML
  */

  /*
  Example pubspec.yaml (Dart project):
  -----------------------------------
  name: my_dart_app
  description: A simple Dart console app
  version: 1.0.0

  environment:
    sdk: ">=3.0.0 <4.0.0"

  dependencies:
    http: ^1.2.0

  dev_dependencies:
    lints: ^3.0.0
  -----------------------------------
  */

  /*
  Example pubspec.yaml (Flutter project):
  --------------------------------------
  name: my_flutter_app
  description: A Flutter app
  version: 1.0.0+1

  environment:
    sdk: ">=3.0.0 <4.0.0"

  dependencies:
    flutter:
      sdk: flutter
    cupertino_icons: ^1.0.6

  flutter:
    assets:
      - assets/images/
    fonts:
      - family: Poppins
        fonts:
          - asset: assets/fonts/Poppins-Regular.ttf
  --------------------------------------
  */

  /*
  -------------------------------------
  2) What is a "package"?
  -------------------------------------

  A package is a reusable set of code (library) that provides features, such as:
  - HTTP requests (calling APIs)
  - JSON tools (some built-in, many external)
  - State management (Flutter)
  - Utilities (formatting, validation)

  Packages save time and improve quality.
  */

  /*
  -------------------------------------
  3) How to add packages
  -------------------------------------

  Dart (console project) common workflow:
  - Create a project with pubspec support:
      dart create my_app
      cd my_app

  - Add a package:
      dart pub add http

  - Download packages:
      dart pub get
    (Usually happens automatically after 'pub add')

  Flutter common workflow:
  - Add a package:
      flutter pub add http

  - Download packages:
      flutter pub get
  */

  /*
  -------------------------------------
  4) Imports: built-in vs external
  -------------------------------------

  Built-in (core libraries):
  - start with 'dart:'
  - always available (no need to install)
  Example:
    import 'dart:math';

  External packages:
  - start with 'package:'
  - must be added in pubspec.yaml first
  Example:
    import 'package:http/http.dart' as http;
  */

  /*
  -------------------------------------
  5) Executable demo using core libraries
  -------------------------------------
  Since external packages may not be installed yet,
  we demonstrate two built-in libraries that always work.
  */

  // dart:math demo
  int randomNumber = Random().nextInt(100); // 0..99
  print("Random number: $randomNumber");

  // dart:convert demo (JSON encoding/decoding)
  Map<String, dynamic> user = {
    "name": "Galen",
    "age": 22,
    "isStudent": true,
  };

  String jsonText = jsonEncode(user);
  print("JSON Encoded: $jsonText");

  Map<String, dynamic> decoded = jsonDecode(jsonText);
  print("JSON Decoded name: ${decoded["name"]}");

  /*
  -------------------------------------
  6) Optional: external package example (commented)
  -------------------------------------

  This is how you would use an external package, e.g. 'http'.

  Steps:
  1) Create project (if not yet):
        dart create my_app
        cd my_app

  2) Add http:
        dart pub add http

  3) Then uncomment code below and run:
        dart run
  */

  // import 'package:http/http.dart' as http;
  //
  // Future<void> fetchExample() async {
  //   var url = Uri.parse("https://example.com");
  //   var response = await http.get(url);
  //   print("Status: ${response.statusCode}");
  // }

}

/*
-------------------------------------
Summary
-------------------------------------

pubspec.yaml:
- The "control file" of your Dart/Flutter project

Packages:
- Reusable libraries you can install

Core libraries:
- 'dart:...' built-in, always available

External packages:
- 'package:...' must be added via pubspec + pub get

Flutter connection:
- In Flutter, pubspec.yaml also controls assets/fonts
*/
