/*
-------------------------------------
     Dart - Iterating Collections
-------------------------------------
*/

void main() {
  Map<String, int> scores = {
    "Math": 90,
    "Science": 85,
  };

  scores.forEach((key, value) {
    print("$key: $value");
  });

  for (var entry in scores.entries) {
    print("${entry.key} => ${entry.value}");
  }
}
