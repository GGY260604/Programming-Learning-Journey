#include <iostream>
using namespace std;

class Employee {
private:
    int salary;  // private data cannot be accessed directly outside the class

public:
    // Setter
    void setSalary(int s) {
        if (s >= 0)
            salary = s;
        else
            cout << "Invalid salary value" << endl;
    }

    // Getter
    int getSalary() {
        return salary;
    }
};

int main() {
    Employee emp;
    emp.setSalary(5000);
    cout << "Employee salary: " << emp.getSalary() << endl;

    return 0;
}

/*
Important Notes:
- Encapsulation means restricting direct access to data and providing controlled access through methods
- private data members can only be accessed using public setter and getter methods
- This protects data integrity and prevents misuse
*/
