/*
-------------------------------------
        C++ Operators - Assignment
-------------------------------------
Assignment operators are used to assign values
and perform compound operations.
*/

#include <iostream>
using namespace std;

int main() {
    int x = 10;

    x += 5;   // x = x + 5
    cout << "x += 5 => " << x << "\n";

    x -= 3;   // x = x - 3
    cout << "x -= 3 => " << x << "\n";

    x *= 2;   // x = x * 2
    cout << "x *= 2 => " << x << "\n";

    x /= 4;   // x = x / 4
    cout << "x /= 4 => " << x << "\n";

    x %= 3;   // x = x % 3
    cout << "x %= 3 => " << x << "\n";
}

/*
Output:
x += 5 => 15
x -= 3 => 12
x *= 2 => 24
x /= 4 => 6
x %= 3 => 0

Notes:
- Assignment operators combine calculation and assignment.
- Common ones: =, +=, -=, *=, /=, %=.
-------------------------------------
*/
