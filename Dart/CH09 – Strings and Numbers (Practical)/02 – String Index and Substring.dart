/*
-------------------------------------
  Dart - String Index and Substring
-------------------------------------
*/

void main() {
  String word = "Flutter";

  print(word[0]);               // F
  print(word.substring(0, 3));  // Flu
  print(word.substring(3));     // tter
}

/*
Rules:
- Index starts at 0
- substring(start, end)
- end index is exclusive
*/
