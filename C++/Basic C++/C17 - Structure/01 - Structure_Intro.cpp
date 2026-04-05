#include <iostream>
using namespace std;

// Structure is a user-defined data type that groups multiple variables
// (of possibly different types) into a single unit.

struct Student {
    string name;
    int age;
    double gpa;
};

int main() {
    // Declare a variable of type Student
    Student s1;

    // Assign values to the structure members
    s1.name = "Alice";
    s1.age = 20;
    s1.gpa = 3.85;

    // Print structure values
    cout << "Student Info:" << endl;
    cout << "Name: " << s1.name << endl;
    cout << "Age: " << s1.age << endl;
    cout << "GPA: " << s1.gpa << endl;

    // Note:
    // - Structures can contain different data types
    // - Members are accessed using the dot (.) operator
}
