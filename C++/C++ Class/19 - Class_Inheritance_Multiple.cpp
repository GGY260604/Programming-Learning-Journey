#include <iostream>
using namespace std;

// Base class 1
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

// Base class 2
class Address {
private:
    string city;
    string country;

public:
    Address(string c, string co) {
        city = c;
        country = co;
    }

    string getCity() { return city; }
    string getCountry() { return country; }
};

// Derived class inheriting from two base classes (Multiple Inheritance)
class Employee : public Person, public Address {
private:
    string position;

public:
    Employee(string n, int a, string c, string co, string p)
        : Person(n, a), Address(c, co) {  // Call both base constructors
        position = p;
    }

    void displayEmployee() {
        cout << "Name: " << getName()
             << ", Age: " << getAge()
             << ", City: " << getCity()
             << ", Country: " << getCountry()
             << ", Position: " << position << endl;
    }
};

int main() {
    Employee e1("Bob", 30, "Kuala Lumpur", "Malaysia", "Manager");
    e1.displayEmployee();

    return 0;
}

/*
Important Notes:
- Multiple Inheritance:
    Derived class inherits from more than one base class
- Constructor call order:
    Base1 constructor -> Base2 constructor -> Derived constructor
- Private members of all base classes remain inaccessible directly
- Use public getters/setters for professional encapsulation
- Diamond problem can occur in multiple inheritance; use virtual inheritance if needed
*/
