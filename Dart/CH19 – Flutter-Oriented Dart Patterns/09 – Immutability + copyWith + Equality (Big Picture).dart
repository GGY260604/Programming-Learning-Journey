/*
-------------------------------------
       Big Picture Pattern
-------------------------------------

This is the CORE Flutter data pattern:

- final fields
- immutable objects
- copyWith for updates
- equality by value
*/

class StateModel {
  final int counter;

  StateModel(this.counter);

  StateModel copyWith({int? counter}) {
    return StateModel(counter ?? this.counter);
  }

  @override
  bool operator ==(Object other) =>
      other is StateModel && other.counter == counter;

  @override
  int get hashCode => counter.hashCode;
}

void main() {
  StateModel s1 = StateModel(0);
  StateModel s2 = s1.copyWith(counter: 1);

  print(s1.counter);
  print(s2.counter);
}
