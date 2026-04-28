#include <iostream>
using namespace std;

// Base class
class Employee {
private:
    string name;
    double salary;

public:
    Employee(string n, double s) {
        name = n;
        salary = s;
    }

    string getName() { return name; }
    double getSalary() { return salary; }

    // Base class method
    virtual void displayInfo() {
        cout << "Employee Name: " << name
             << ", Salary: RM" << salary << endl;
    }
};

// Derived class
class Manager : public Employee {
private:
    string department;

public:
    Manager(string n, double s, string d) : Employee(n, s) {
        department = d;
    }

    // Method overriding: same method name, return type, and parameter list
    void displayInfo() override {
        cout << "Manager Name: " << getName()
             << ", Salary: RM" << getSalary()
             << ", Department: " << department << endl;
    }
};

int main() {
    Employee e1("Galen", 3000);
    Manager m1("Alice", 5000, "IT");

    e1.displayInfo(); // Calls Employee version
    m1.displayInfo(); // Calls Manager version

    return 0;
}

/*
Important Notes:
- Method overriding happens when a derived class redefines a base class method
- The overriding method should have the same:
    method name, return type, and parameter list
- Use virtual in the base class to allow proper overriding behavior
- Use override in the derived class to let the compiler check your override
- The derived method can still use base class data through public/protected methods
- Private members of the base class remain inaccessible directly in the derived class
- Method overriding supports polymorphism, which is covered in the next lessons
*/
