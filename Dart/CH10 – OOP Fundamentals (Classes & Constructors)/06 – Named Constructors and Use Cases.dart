/*
-------------------------------------
       OOP - Named Constructors
-------------------------------------

Named constructors create multiple "creation styles"
without overloading like C++/Java.

Example:
- Person(...) for normal creation
- Person.guest() for default guest profile
*/

class Person {
  final String name;
  final int age;

  Person(this.name, this.age);

  Person.guest()
      : name = "Guest",
        age = 0;

  void introduce() {
    print("Name: $name, Age: $age");
  }
}

void main() {
  Person("Galen", 22).introduce();
  Person.guest().introduce();
}

/*
Important:
- Dart does NOT support constructor overloading.
- Named constructors provide an alternative.

Flutter usage:
- Model.fromJson(...)
- Model.empty()
- Widget variants (Widget.primary(), Widget.secondary())
*/
