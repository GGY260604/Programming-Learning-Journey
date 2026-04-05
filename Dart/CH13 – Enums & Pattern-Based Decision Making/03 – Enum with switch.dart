/*
-------------------------------------
       Dart - Enum with switch
-------------------------------------

Enums are most useful with switch.
*/

enum Status {
  loading,
  success,
  error,
}

void main() {
  Status status = Status.success;

  switch (status) {
    case Status.loading:
      print("Loading...");
      break;
    case Status.success:
      print("Success!");
      break;
    case Status.error:
      print("Error occurred");
      break;
  }
}

/*
Rules:
- switch MUST handle all enum values
- compiler warns if a case is missing
*/
