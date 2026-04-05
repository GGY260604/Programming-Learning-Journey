/*
-------------------------------------
       OOP - Encapsulation
-------------------------------------

Encapsulation means:
- protecting internal data
- exposing controlled access
*/

class Person {
  String _name;
  int _age;

  Person(this._name, this._age);

  /*
  Getter exposes data safely
  */
  String get name => _name;

  /*
  Setter enforces rules
  */
  set age(int value) {
    if (value >= 0) {
      _age = value;
    }
  }

  void introduce() {
    print("$_name, age $_age");
  }
}

void main() {
  Person p = Person("Galen", 22);

  p.age = 23;
  p.introduce();
}

/*
'_' means library-private.

Encapsulation prevents invalid state.
*/
