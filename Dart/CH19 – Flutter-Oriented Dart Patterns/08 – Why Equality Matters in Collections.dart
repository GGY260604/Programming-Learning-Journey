/*
-------------------------------------
       Equality in Collections
-------------------------------------
*/

class Item {
  final int id;

  Item(this.id);

  @override
  bool operator ==(Object other) =>
      other is Item && other.id == id;

  @override
  int get hashCode => id.hashCode;
}

void main() {
  Set<Item> items = {
    Item(1),
    Item(1),
  };

  print(items.length); // 1 ✅
}

/*
Without proper equality:
- duplicates appear
- state comparison breaks
*/
