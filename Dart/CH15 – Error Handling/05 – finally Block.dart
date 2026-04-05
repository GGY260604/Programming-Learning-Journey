/*
-------------------------------------
           Dart - finally
-------------------------------------

finally ALWAYS runs.
*/

void main() {
  try {
    print("Trying");
    int.parse("abc");
  } catch (e) {
    print("Caught error");
  } finally {
    print("Cleanup runs here");
  }
}

/*
Use finally for:
- closing files
- releasing resources
*/
