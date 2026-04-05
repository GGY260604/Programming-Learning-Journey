#include <iostream>
using namespace std;

// Class Declaration
class Student {
private:
    string name;
    int age;
    double gpa;

public:
    // 1. Default Constructor
    // This constructor will automatically be called when no arguments are given.
    Student() {
        name = "Unknown";
        age = 0;
        gpa = 0.0;
        cout << "Default constructor called!" << endl;
    }

    // 2. Parameterized Constructor
    // Called when arguments are passed.
    Student(string n, int a, double g) {
        name = n;
        age = a;
        gpa = g;
        cout << "Parameterized constructor called!" << endl;
    }

    // 3. Constructor with Default Parameters
    // Default values are provided, so user may skip some arguments.
    Student(string n, int a = 18) {
        name = n;
        age = a;
        gpa = 4.0;
        cout << "Constructor with default parameter called!" << endl;
    }

    // 4. Constructor Using Initializer List
    // Recommended way for initializing members (especially const or reference members).
    Student(double g, string n) : gpa(g), name(n), age(20) {
        cout << "Constructor using initializer list called!" << endl;
    }

    // Display function
    void display() {
        cout << "Name: " << name
             << ", Age: " << age
             << ", GPA: " << gpa << endl;
    }
};

int main() {
    cout << "--- Default Constructor Example ---" << endl;
    Student s1;  // Calls default constructor
    s1.display();

    cout << "\n--- Parameterized Constructor Example ---" << endl;
    Student s2("Alice", 21, 3.8);
    s2.display();

    cout << "\n--- Constructor with Default Parameter Example ---" << endl;
    Student s3("Bob");  // Only passes name, age uses default 18
    s3.display();

    cout << "\n--- Constructor with Initializer List Example ---" << endl;
    Student s4(3.5, "Charlie");
    s4.display();

    return 0;
}

/*
IMPORTANT NOTES:
1. A constructor has the same name as the class and no return type.
2. Default constructors are automatically created if no constructor is defined.
3. Default parameters allow flexible argument passing.
4. Initializer lists are efficient and necessary for initializing const/reference members.
5. Constructors are executed automatically when an object is created.
*/
