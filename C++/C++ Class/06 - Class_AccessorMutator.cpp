#include <iostream>
using namespace std;

class Employee {
private:
    string name;   // Private member, cannot be accessed directly outside class
    int age;
    double salary;

public:
    // Constructor
    Employee(string n, int a, double s) {
        name = n;
        setAge(a);      // Use setter to validate
        setSalary(s);   // Use setter to validate
    }

    // --- Accessor (Getter) Functions ---
    string getName() {
        return name;
    }

    int getAge() {
        return age;
    }

    double getSalary() {
        return salary;
    }

    // --- Mutator (Setter) Functions ---
    void setName(string n) {
        if (!n.empty())   // Validation: name cannot be empty
            name = n;
        else
            cout << "Invalid name" << endl;
    }

    void setAge(int a) {
        if (a > 0 && a < 100)  // Validation: age must be reasonable
            age = a;
        else
            cout << "Invalid age" << endl;
    }

    void setSalary(double s) {
        if (s >= 0)  // Salary cannot be negative
            salary = s;
        else
            cout << "Invalid salary" << endl;
    }

    // Display employee info
    void displayInfo() {
        cout << "Name: " << getName()
             << ", Age: " << getAge()
             << ", Salary: " << getSalary() << endl;
    }
};

int main() {
    // Create object using constructor
    Employee emp1("Galen", 21, 5000);

    emp1.displayInfo();

    cout << "\nUpdating employee info using setters..." << endl;
    emp1.setName("Alex");
    emp1.setAge(25);
    emp1.setSalary(6000);

    emp1.displayInfo();

    cout << "\nTrying to set invalid values..." << endl;
    emp1.setAge(-5);       // Invalid
    emp1.setSalary(-100);  // Invalid

    emp1.displayInfo();    // Original valid values remain

    return 0;
}

/*
Important Notes:
- Encapsulation: Keep class data private and provide public getter/setter methods
- Getter (Accessor): Retrieve value of private members
- Setter (Mutator): Set value of private members with validation
- Benefits:
    - Protects data integrity
    - Provides controlled access
    - Allows validation before modification
- Recommended practice: Always use getters/setters instead of direct public access
*/
