#include <iostream>
using namespace std;

// Base class
class Person {
private:
    string name;
    int age;

public:
    // Default constructor
    Person() {
        name = "Unknown";
        age = 0;
        cout << "Base default constructor called" << endl;
    }

    // Parameterized constructor
    Person(string n, int a) {
        name = n;
        age = a;
        cout << "Base parameterized constructor called" << endl;
    }

    void displayPerson() {
        cout << "Name: " << name << ", Age: " << age << endl;
    }
};

// Derived class
class Student : public Person {
private:
    string major;

public:
    // 1. Implicit base constructor call (default constructor)
    Student() {
        major = "Undeclared";
        cout << "Derived default constructor called" << endl;
    }

    // 2. Explicit call to base parameterized constructor using initializer list
    Student(string n, int a, string m) : Person(n, a) {
        major = m;
        cout << "Derived parameterized constructor called" << endl;
    }

    void displayStudent() {
        displayPerson(); // Call base class method
        cout << "Major: " << major << endl;
    }
};

int main() {
    cout << "--- Implicit Base Constructor Call ---" << endl;
    Student s1; // Base default constructor called automatically
    s1.displayStudent();

    cout << "\n--- Explicit Base Constructor Call ---" << endl;
    Student s2("Alice", 20, "Computer Science"); // Explicit base constructor call via initializer list
    s2.displayStudent();

    return 0;
}

/*
Important Notes:
- If derived class constructor does not explicitly call base constructor:
    - Base default constructor is called automatically
    - If base has no default constructor, you must call a parameterized constructor explicitly
- Ways to call base constructors from derived:
    1. Implicit call (default constructor automatically)
    2. Explicit call using initializer list: Derived(...) : Base(args) {...}
    3. Base constructor can also be called inside derived constructor body, but initializer list is preferred
- Constructor call order:
    Base class constructor -> Derived class constructor
- Ensures base class is properly initialized before derived adds its members
*/
