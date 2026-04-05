/*
-------------------------------------
         Enum Exhaustiveness
-------------------------------------

One big advantage of enums:
The compiler protects you when enums change.
*/

enum Status {
  loading,
  success,
  error,
  empty, // newly added
}

void main() {
  Status status = Status.empty;

  switch (status) {
    case Status.loading:
      print("Loading");
      break;
    case Status.success:
      print("Success");
      break;
    case Status.error:
      print("Error");
      break;
    // ❌ If you forget Status.empty,
    // the compiler warns you
    case Status.empty:
      print("Empty");
      break;
  }
}

/*
Careless mistake ❌
Ignoring compiler warnings when enum changes
*/
