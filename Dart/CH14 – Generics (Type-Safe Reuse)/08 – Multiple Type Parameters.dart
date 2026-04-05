/*
-------------------------------------
       Multiple Generic Parameters
-------------------------------------
*/

class Pair<K, V> {
  K key;
  V value;

  Pair(this.key, this.value);
}

void main() {
  Pair<String, int> score = Pair("Math", 95);
  print("${score.key}: ${score.value}");
}
