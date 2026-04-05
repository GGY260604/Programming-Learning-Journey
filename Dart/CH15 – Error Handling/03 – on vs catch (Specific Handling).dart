/*
-------------------------------------
        Dart - on vs catch
-------------------------------------

Use 'on' when you know the exception type.
*/

void main() {
  try {
    double value = double.parse("abc");
    print(value);
  } on FormatException {
    print("Invalid number format");
  } catch (e) {
    print("Unknown error: $e");
  }
}

/*
Order matters:
- Specific handlers first
- Generic catch last
*/
