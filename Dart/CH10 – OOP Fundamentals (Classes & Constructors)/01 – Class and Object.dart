/*
-------------------------------------
  Dart - What is a Class and Object
-------------------------------------

This file explains OOP from ZERO.

Do NOT think in terms of syntax first.
Think in terms of real-world modeling.
*/

/*
-------------------------------------
1) What is a Class?
-------------------------------------

A class is NOT a value.
A class is NOT an object.

A class is a BLUEPRINT.

It describes:
- what data an object will have (fields)
- what actions an object can perform (methods)

No memory is allocated for a class by itself.
*/

class Person {

  /*
  -------------------------------------
  2) Fields (Object Data)
  -------------------------------------

  Fields represent the STATE of an object.

  Every object created from this class
  will have its OWN copy of these fields.
  */

  String name = "";
  int age = 0;

  /*
  -------------------------------------
  3) Methods (Object Behavior)
  -------------------------------------

  Methods describe WHAT an object can do.

  They can:
  - read fields
  - modify fields
  - use the object's current state
  */

  void introduce() {
    print("My name is $name, age $age");
  }
}

void main() {

  /*
  -------------------------------------
  4) What is an Object?
  -------------------------------------

  An object is a REAL instance created
  from a class.

  Memory is allocated ONLY when:
      Person()
  is executed.
  */

  Person p = Person();

  /*
  At this moment:
  - p exists in memory
  - p.name exists
  - p.age exists
  */

  p.name = "Galen";
  p.age = 22;

  /*
  Each object has its OWN data.
  If we create another Person,
  it will NOT share name or age.
  */

  p.introduce();
}

/*
-------------------------------------
Key Takeaways
-------------------------------------

- Class = blueprint (no memory by itself)
- Object = instance (real memory)
- Fields = object state
- Methods = object behavior

This mental model is critical for Flutter.
*/
