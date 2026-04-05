/*
-------------------------------------
          Dart - Map<K, V>
-------------------------------------

Map<K, V> means:
- keys are type K
- values are type V
*/

void main() {
  Map<String, int> scores = {
    "Math": 90,
    "Science": 85,
  };

  // scores["English"] = "A"; // ❌ wrong type

  scores["English"] = 88;
  print(scores);
}

/*
Why important:
- prevents mismatched key/value usage
- very common in JSON & APIs
*/
