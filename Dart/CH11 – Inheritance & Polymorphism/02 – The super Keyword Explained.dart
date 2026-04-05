/*
-------------------------------------
        OOP - super Keyword
-------------------------------------

super refers to the PARENT class.
*/

class Person {
  String name;

  Person(this.name);

  void introduce() {
    print("I am a person named $name");
  }
}

class Teacher extends Person {
  String subject;

  Teacher(String name, this.subject) : super(name);

  void teach() {
    print("$name teaches $subject");
  }
}

void main() {
  Teacher t = Teacher("Alex", "Math");
  t.introduce();
  t.teach();
}

/*
-------------------------------------
Common Beginner Mistake ❌
-------------------------------------

Forgetting to call super():

class Teacher extends Person {
  Teacher(String name); // ❌ ERROR
}

Reason:
- Parent has no default constructor
- Dart forces explicit initialization
*/
