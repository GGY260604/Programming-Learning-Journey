/*
-------------------------------------
    OOP - Constructor (Block Body)
-------------------------------------

This is the "classic" constructor style (similar to Java/C++).

You declare fields, then assign inside { }.

When to use:
- When you need extra logic / validation
- When you want to print/log something
- When initialization requires computation
*/

class Person {
  String name = "";
  int age = 0;

  Person(String name, int age) {
    /*
    Here, the parameters (name, age) shadow the fields.
    That means:
    - name refers to the PARAMETER
    - this.name refers to the FIELD
    */
    this.name = name;
    this.age = age;

    // Extra logic allowed here
    if (this.age < 0) {
      this.age = 0;
    }
  }

  void introduce() {
    print("Name: $name, Age: $age");
  }
}

void main() {
  Person p = Person("Galen", -5);
  p.introduce();
}

/*
Common careless mistake ❌
- Forgetting "this." when parameter name matches field name:
  name = name;  // does nothing useful (assigns parameter to itself)
*/
