/*
-------------------------------------
    var vs dynamic (with generics)
-------------------------------------

These behave VERY differently.
*/

void main() {
  var list1 = <int>[1, 2, 3]; // inferred as List<int>
  // list1.add("x"); // ❌ compile-time error

  dynamic list2 = <int>[1, 2, 3];
  list2.add("x"); // ❌ allowed now, breaks later

  print(list1);
  print(list2);
}

/*
Rule:
- Prefer var + generics
- Avoid dynamic unless unavoidable
*/
