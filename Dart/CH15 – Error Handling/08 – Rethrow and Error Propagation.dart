/*
-------------------------------------
            Dart - rethrow          
-------------------------------------

Used when you want to:
- log an error
- but let it propagate upward
*/

void process() {
  try {
    int.parse("abc");
  } catch (e) {
    print("Logging error");
    rethrow; // passes error to caller
  }
}

void main() {
  try {
    process();
  } catch (e) {
    print("Handled at higher level");
  }
}

/*
Careless mistake ❌
Throwing a NEW exception instead of rethrow
loses original stack trace.
*/
