#include <iostream>
using namespace std;

// Function template to return the maximum of two values
template <typename T>
T getMax(T a, T b) {
    return (a > b) ? a : b;
}

// Function template to swap two values
template <typename T>
void swapValues(T &x, T &y) {
    T temp = x;
    x = y;
    y = temp;
}

int main() {
    int a = 5, b = 10;
    cout << "Max of " << a << " and " << b << " is " << getMax(a, b) << endl;

    double x = 3.5, y = 7.2;
    cout << "Max of " << x << " and " << y << " is " << getMax(x, y) << endl;

    cout << "\nBefore swap: a = " << a << ", b = " << b << endl;
    swapValues(a, b);
    cout << "After swap: a = " << a << ", b = " << b << endl;

    return 0;
}

/*
Important Notes:
- Function templates allow writing generic functions
- Type T is deduced automatically by compiler
- Encapsulation: pass arguments by reference if modification is needed, otherwise by value
- Professional practice: keep template functions simple and type-safe
*/
