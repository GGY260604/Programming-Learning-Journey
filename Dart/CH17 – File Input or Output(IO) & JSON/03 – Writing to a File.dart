/*
-------------------------------------
         Writing to a File
-------------------------------------

This example writes text to a file.

IMPORTANT:
- This works in Dart console apps
- Flutter requires different APIs (later)
*/

import 'dart:io';

void main() async {
  File file = File('data.txt');

  await file.writeAsString("Hello Dart File");

  print("File written successfully");
}

/*
Careless mistake ❌
Forgetting await → file may not be written
*/
