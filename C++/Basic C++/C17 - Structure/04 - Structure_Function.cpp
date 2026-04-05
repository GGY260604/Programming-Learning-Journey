#include <iostream>
using namespace std;

struct Employee {
    string name;
    double salary;
};

// Function that takes structure as parameter
void printEmployee(Employee e) {
    cout << "Employee Name: " << e.name << endl;
    cout << "Salary: RM " << e.salary << endl;
}

// Function that returns a structure
Employee createEmployee(string n, double s) {
    Employee e;
    e.name = n;
    e.salary = s;
    return e;
}

int main() {
    Employee emp1 = {"Galen", 5500.50};
    printEmployee(emp1);

    cout << endl;

    Employee emp2 = createEmployee("Cleo", 6200.75);
    printEmployee(emp2);
}
