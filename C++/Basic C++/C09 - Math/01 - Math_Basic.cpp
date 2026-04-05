/*
-------------------------------------
              C++ MATH
-------------------------------------
C++ provides basic arithmetic operators (+, -, *, /, %)
and a <cmath> library for more complex operations.
*/

#include <iostream>
using namespace std;

int main() {
    int a = 10;
    int b = 3;

    // Basic arithmetic
    cout << "a + b = " << a + b << endl;
    cout << "a - b = " << a - b << endl;
    cout << "a * b = " << a * b << endl;
    cout << "a / b = " << a / b << endl;   // integer division (result = 3)
    cout << "a % b = " << a % b << endl;   // remainder

    // Floating-point division
    double x = 10.0, y = 3.0;
    cout << "x / y = " << x / y << endl;   // result = 3.33333

    /*
    -------------------------------------
                NOTES
    -------------------------------------
    - Division between integers gives an integer result.
      Example: 10 / 3 = 3
    - Use floating point values to get decimal results.
    - % (modulus) only works with integers.
    */
    return 0;
}
