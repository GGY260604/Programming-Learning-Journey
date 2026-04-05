/*
-------------------------------------
       OOP - Method Overriding
-------------------------------------

Overriding means:
- Child provides its OWN implementation
- Method signature must match exactly
*/

class Person {
  void introduce() {
    print("I am a person");
  }
}

class Student extends Person {

  @override
  void introduce() {
    print("I am a student");
  }
}

void main() {
  Person p = Student();
  p.introduce(); // Student version runs
}

/*
-------------------------------------
IMPORTANT
-------------------------------------

@override is optional but STRONGLY recommended.

Why?
- Compiler checks correctness
- Prevents silent bugs
*/
