#include <iostream>
using namespace std;

class Student {
private:
    string name;
    int age;
    double gpa;

public:
    // Constructor 1: Default
    Student() {
        name = "Unknown";
        age = 0;
        gpa = 0.0;
        cout << "Default constructor called" << endl;
    }

    // Constructor 2: Parameterized
    Student(string n, int a, double g) {
        name = n;
        age = a;
        gpa = g;
        cout << "Parameterized constructor called" << endl;
    }

    // Constructor 3: Parameterized with default arguments
    Student(string n, int a = 18) {
        name = n;
        age = a;
        gpa = 4.0;
        cout << "Constructor with default parameter called" << endl;
    }

    // Display function
    void display() {
        cout << "Name: " << name
             << ", Age: " << age
             << ", GPA: " << gpa << endl;
    }

    // Destructor
    ~Student() {
        // Called automatically when object goes out of scope
        cout << "Destructor called for " << name << endl;
    }
};

int main() {
    cout << "--- Default Constructor ---" << endl;
    Student s1;
    s1.display();

    cout << "\n--- Parameterized Constructor ---" << endl;
    Student s2("Alice", 21, 3.8);
    s2.display();

    cout << "\n--- Constructor with Default Parameter ---" << endl;
    Student s3("Bob");  // age uses default 18
    s3.display();

    cout << "\n--- Array of Objects Example ---" << endl;
    Student arr[2];  // Default constructor called for each object
    arr[0].display();
    arr[1].display();

    cout << "\n--- Destructor demo at end of main ---" << endl;
    return 0;
}

/*
Important Notes:
- Constructor Overloading: Multiple constructors with different parameter lists
- Compiler chooses the correct constructor based on arguments passed
- Destructor:
    - Same name as class, prefixed with ~
    - No parameters, no return type
    - Called automatically when object goes out of scope
    - Useful for cleanup (e.g., releasing memory, closing files)
- Arrays of objects call constructors for each element automatically
*/
