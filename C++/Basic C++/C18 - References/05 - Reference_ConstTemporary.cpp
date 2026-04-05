#include <iostream>
using namespace std;

// Const reference allows binding to temporary values or literals safely
void showValue(const int &num) {
    cout << "Number is " << num << endl;
}

int main() {
    // Normally, a reference cannot bind to a temporary (like 5)
    // But a const reference CAN bind to a temporary safely.
    showValue(5);  // Works fine due to const reference

    double pi = 3.14159;
    const double &refPi = pi;     // Binds to an existing variable
    const double &refTemp = 2.718; // Binds to a temporary literal

    cout << "refPi = " << refPi << endl;
    cout << "refTemp = " << refTemp << endl;

    // Notes:
    // - const reference extends the lifetime of a temporary object
    // - Commonly used in function parameters to avoid copying large objects
}
