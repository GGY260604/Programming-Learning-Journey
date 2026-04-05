/*
-------------------------------------
       C++ Variables - Constants
-------------------------------------
Constants are variables whose values cannot be changed.
Use 'const' or 'constexpr' to declare them.
*/

#include <iostream>
using namespace std;

int main() {
    const int birthYear = 2000;         // Constant integer
    const double PI = 3.14159;          // Constant floating-point number
    constexpr int maxScore = 100;       // Compile-time constant

    cout << "Birth Year: " << birthYear << "\n";
    cout << "PI: " << PI << "\n";
    cout << "Max Score: " << maxScore << "\n";

    // birthYear = 1999;   // Error: cannot modify a constant
    return 0;
}

/*
Output:
Birth Year: 2000
PI: 3.14159
Max Score: 100

Notes:
- 'const' makes a variable read-only after initialization.
- 'constexpr' ensures the value is constant and known at compile time.
- Both help prevent accidental changes and improve program safety.
- Convention: constants are often written in ALL_CAPS, but it's optional.
*/
