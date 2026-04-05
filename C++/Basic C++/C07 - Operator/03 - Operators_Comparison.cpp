/*
-------------------------------------
        C++ Operators - Comparison
-------------------------------------
Comparison operators are used to compare two values.
They return true (1) or false (0).
*/

#include <iostream>
using namespace std;

int main() {
    int a = 10, b = 20;

    cout << (a == b) << "  (a == b)\n";  // Equal
    cout << (a != b) << "  (a != b)\n";  // Not equal
    cout << (a > b)  << "  (a > b)\n";   // Greater than
    cout << (a < b)  << "  (a < b)\n";   // Less than
    cout << (a >= b) << "  (a >= b)\n";  // Greater or equal
    cout << (a <= b) << "  (a <= b)\n";  // Less or equal
}

/*
Output:
0  (a == b)
1  (a != b)
0  (a > b)
1  (a < b)
0  (a >= b)
1  (a <= b)

Notes:
- Comparison operators always return a boolean (true or false).
- 'true' prints as 1, 'false' prints as 0.
-------------------------------------
*/
