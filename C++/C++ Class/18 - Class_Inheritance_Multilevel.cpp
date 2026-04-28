#include <iostream>
using namespace std;

// Base class
class Person {
private:
    string name;
    int age;

public:
    Person(string n, int a) {
        name = n;
        age = a;
    }

    string getName() { return name; }
    int getAge() { return age; }
};

// Derived class from Person
class Student : public Person {
private:
    string major;

public:
    Student(string n, int a, string m) : Person(n, a) {
        major = m;
    }

    string getMajor() { return major; }
};

// Derived class from Student (Multilevel Inheritance)
class GraduateStudent : public Student {
private:
    string researchTopic;

public:
    GraduateStudent(string n, int a, string m, string r)
        : Student(n, a, m) {
        researchTopic = r;
    }

    void displayGraduateStudent() {
        cout << "Name: " << getName()
             << ", Age: " << getAge()
             << ", Major: " << getMajor()
             << ", Research Topic: " << researchTopic << endl;
    }
};

int main() {
    GraduateStudent gs1("Alice", 24, "Computer Science", "Artificial Intelligence");
    gs1.displayGraduateStudent();

    return 0;
}

/*
Important Notes:
- Multilevel Inheritance:
    A derived class becomes the base class for another derived class
- In this example:
    Person -> Student -> GraduateStudent
- Constructor call order:
    Person constructor -> Student constructor -> GraduateStudent constructor
- Private members of each class remain inaccessible directly in child classes
- Use public getters/setters to access private data safely
- Multilevel inheritance helps reuse and extend behavior step by step
*/
