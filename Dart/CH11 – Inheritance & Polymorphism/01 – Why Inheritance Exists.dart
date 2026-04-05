/*
-------------------------------------
     OOP - Why Inheritance Exists
-------------------------------------

Inheritance exists to solve ONE problem:

Code duplication.

If multiple classes share:
- similar data
- similar behavior

We should NOT rewrite them.
*/

/*
-------------------------------------
Base class (Parent)
-------------------------------------
*/

class Person {
  String name;
  int age;

  Person(this.name, this.age);

  void introduce() {
    print("I am $name, age $age");
  }
}

/*
-------------------------------------
Derived class (Child)
-------------------------------------

Student IS A Person.
This is the key rule:
- If you can say "X is a Y", inheritance may apply.
*/

class Student extends Person {
  String studentId;

  Student(String name, int age, this.studentId)
      : super(name, age); // pass data to parent
}

void main() {
  Student s = Student("Galen", 22, "S123");

  s.introduce(); // inherited method
  print(s.studentId);
}

/*
-------------------------------------
Key Takeaways
-------------------------------------

- extends = "is-a" relationship
- Child automatically gets:
  - fields
  - methods
- Parent constructor MUST be called
*/
