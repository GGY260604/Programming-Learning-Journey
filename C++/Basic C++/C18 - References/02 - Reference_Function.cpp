#include <iostream>
using namespace std;

// Pass by reference allows a function to modify the original variable

void addOne(int &n) {
    n = n + 1;
    cout << "Inside function, n = " << n << endl;
}

int main() {
    int number = 5;

    cout << "Before function call, number = " << number << endl;
    addOne(number);   // Pass by reference
    cout << "After function call, number = " << number << endl;

    // Notes:
    // - Passing by reference (&) allows direct modification of the argument
    // - No copy is made (more efficient than pass by value)
    // - Useful when we need to return multiple results or modify input directly
}
