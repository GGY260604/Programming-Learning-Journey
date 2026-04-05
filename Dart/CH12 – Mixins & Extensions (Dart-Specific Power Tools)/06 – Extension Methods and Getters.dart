/*
-------------------------------------
    Extension Methods and Getters
-------------------------------------
*/

extension IntExtras on int {
  bool get isEvenNumber => this % 2 == 0;

  int squared() => this * this;
}

void main() {
  print(4.isEvenNumber);
  print(5.squared());
}

/*
Common Flutter usage:
- formatting
- validation
- convenience helpers
*/
