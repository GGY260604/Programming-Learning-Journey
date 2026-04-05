/*
-------------------------------------
        C++ Operators - Arithmetic
-------------------------------------
Arithmetic operators are used to perform
basic mathematical operations.
*/

#include <iostream>
using namespace std;

int main() {
    int a = 10, b = 3;

    cout << "a + b = " << (a + b) << "\n";   // Addition
    cout << "a - b = " << (a - b) << "\n";   // Subtraction
    cout << "a * b = " << (a * b) << "\n";   // Multiplication
    cout << "a / b = " << (a / b) << "\n";   // Division (integer result)
    cout << "a % b = " << (a % b) << "\n";   // Modulus (remainder)

    double x = 10.0, y = 3.0;
    cout << "\nFloating-point division:\n";
    cout << "x / y = " << (x / y) << "\n";   // Gives decimal result

    // Increment and Decrement
    cout << "\nIncrement / Decrement:\n";
    int c = 5;
    cout << "c = " << c << "\n";
    cout << "++c = " << ++c << "  (prefix increment)\n";
    cout << "c++ = " << c++ << "  (postfix increment)\n";
    cout << "Now c = " << c << "\n";
    cout << "--c = " << --c << "  (prefix decrement)\n";
    cout << "c-- = " << c-- << "  (postfix decrement)\n";
    cout << "Now c = " << c << "\n";
}

/*
Output:
a + b = 13
a - b = 7
a * b = 30
a / b = 3
a % b = 1
x / y = 3.33333
++c = 6
c++ = 6
Now c = 7
--c = 6
c-- = 6
Now c = 5

Notes:
- '/' between integers discards remainder.
- '%' (modulus) only works with integers.
- Prefix (++x) changes value before using it.
- Postfix (x++) changes value after using it.
-------------------------------------
*/
