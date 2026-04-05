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

    // Getter methods for encapsulation
    string getName() { return name; }
    int getAge() { return age; }

    // Virtual function for polymorphism demonstration
    virtual void display() {
        cout << "Person Name: " << name << ", Age: " << age << endl;
    }
};

// Derived class
class Student : public Person {
private:
    string major;

public:
    Student(string n, int a, string m) : Person(n, a) {  // Call base constructor
        major = m;
    }

    // Getter for encapsulation
    string getMajor() { return major; }

    // Method overriding
    void display() override {
        cout << "Student Name: " << getName()
             << ", Age: " << getAge()
             << ", Major: " << major << endl;
    }
};

int main() {
    Person p1("Galen", 21);
    p1.display();

    Student s1("Alice", 20, "Computer Science");
    s1.display();

    return 0;
}

/*
Important Notes:
- Inheritance allows a derived class to reuse attributes/methods from a base class
- Access specifiers:
    public inheritance: public and protected members of base remain accessible in derived
    protected inheritance: public and protected become protected
    private inheritance: public and protected become private
- Private members of base class are never directly accessible in derived class
- Encapsulation principle: always use getter/setter to access private members
- Virtual functions allow polymorphic behavior and method overriding
*/
