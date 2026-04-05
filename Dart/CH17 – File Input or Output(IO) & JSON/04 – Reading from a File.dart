/*
-------------------------------------
        Reading from a File
-------------------------------------
*/

import 'dart:io';

void main() async {
  File file = File('data.txt');

  if (await file.exists()) {
    String content = await file.readAsString();
    print(content);
  } else {
    print("File does not exist");
  }
}

/*
Rule:
- Always check existence
- File operations can fail
*/
