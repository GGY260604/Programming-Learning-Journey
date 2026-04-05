/*
-------------------------------------
      Multiple Mixins and Order
-------------------------------------

You can apply MORE THAN ONE mixin.
Order matters.
*/

mixin A {
  void action() {
    print("Action from A");
  }
}

mixin B {
  void action() {
    print("Action from B");
  }
}

class Example with A, B {}

void main() {
  Example e = Example();
  e.action();
}

/*
-------------------------------------
Output:
-------------------------------------
Action from B

Explanation:
- Rightmost mixin wins
- Later mixins override earlier ones

Careless mistake ❌
Assuming order does not matter
*/
