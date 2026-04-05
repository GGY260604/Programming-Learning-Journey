/*
-------------------------------------
        Dart - StringBuffer
-------------------------------------

Efficient way to build large strings.
*/

void main() {
  StringBuffer buffer = StringBuffer();

  buffer.write("Hello");
  buffer.write(" ");
  buffer.write("Dart");

  print(buffer.toString());
}

/*
Use StringBuffer when:
- many concatenations
- loops building strings
*/
