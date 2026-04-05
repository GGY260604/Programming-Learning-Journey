#include <iostream>
using namespace std;

class Employee {
private:
    string name;
    int age;
    double salary;

    // Static member to track total employees
    static int totalEmployees;

public:
    // Constructor
    Employee(string n, int a, double s) {
        name = n;
        setAge(a);
        setSalary(s);
        totalEmployees++;  // Increment static member
    }

    // Destructor
    ~Employee() {
        totalEmployees--;  // Decrement static member when object destroyed
    }

    // Getter/Setter for name
    string getName() { return name; }
    void setName(string n) { if (!n.empty()) name = n; }

    // Getter/Setter for age
    int getAge() { return age; }
    void setAge(int a) { if (a > 0 && a < 100) age = a; }

    // Getter/Setter for salary
    double getSalary() { return salary; }
    void setSalary(double s) { if (s >= 0) salary = s; }

    void displayInfo() {
        cout << "Name: " << getName()
             << ", Age: " << getAge()
             << ", Salary: " << getSalary() << endl;
    }

    // --- Static Method ---
    static int getTotalEmployees() {
        return totalEmployees;
    }
};

// Initialize static member outside class
int Employee::totalEmployees = 0;

int main() {
    cout << "Total Employees: " << Employee::getTotalEmployees() << endl;

    Employee e1("Galen", 21, 5000);
    Employee e2("Alice", 25, 6000);

    e1.displayInfo();
    e2.displayInfo();

    cout << "Total Employees after creation: " << Employee::getTotalEmployees() << endl;

    {
        Employee e3("Bob", 30, 7000);  // Scoped block
        cout << "Total Employees inside block: " << Employee::getTotalEmployees() << endl;
    }  // e3 is destroyed here

    cout << "Total Employees after block: " << Employee::getTotalEmployees() << endl;

    return 0;
}

/*
Important Notes:
- Static members:
    - Shared across all objects of the class
    - Declared inside class with static keyword
    - Must be defined outside class
- Static methods:
    - Can access only static members of the class
    - Called using ClassName::MethodName()
- Encapsulation is maintained:
    - Static data is private
    - Public static getter provides controlled access
- Useful for tracking data common to all objects (e.g., total count)
*/
