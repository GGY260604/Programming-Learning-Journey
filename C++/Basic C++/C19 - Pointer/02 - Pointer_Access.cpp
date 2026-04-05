#include <iostream>
using namespace std;

int main() {
    int number = 10;
    int *ptr = &number;

    cout << "Before change:" << endl;
    cout << "number = " << number << endl;
    cout << "*ptr = " << *ptr << endl;

    // Changing value through pointer
    *ptr = 25;

    cout << "\nAfter change through pointer:" << endl;
    cout << "number = " << number << endl;
    cout << "*ptr = " << *ptr << endl;

    // Notes:
    // - Dereferencing a pointer (*ptr) gives access to the actual variable
    // - Any modification through *ptr affects the original variable
    // - Make sure a pointer points to valid memory before dereferencing
}
