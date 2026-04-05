/*
-------------------------------------
        Dart - Split and Join
-------------------------------------

Used heavily when handling input and CSV-like data.
*/

void main() {
  String csv = "apple,banana,orange";

  List<String> items = csv.split(",");
  print(items);

  String joined = items.join(" | ");
  print(joined);
}
