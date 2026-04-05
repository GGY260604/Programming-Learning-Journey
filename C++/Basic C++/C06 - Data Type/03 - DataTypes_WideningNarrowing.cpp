/*
-------------------------------------
  C++ Data Types - Widening vs Narrowing
-------------------------------------
When converting between numeric types:
- Widening: smaller type -> larger type (safe)
- Narrowing: larger type -> smaller type (may lose data)
*/

#include <iostream>
using namespace std;

int main() {
    // Widening conversion (safe)
    int small = 42;
    double big = small;   // int -> double
    cout << big << "\n";  // 42 printed as 42.0

    // Narrowing conversion (possible data loss)
    double large = 3.14159;
    int narrow = large;   // double -> int, fractional part lost
    cout << narrow << "\n";  // 3

    // Example of narrowing causing overflow
    int x = 1000;
    char c = x;   // Only stores one byte (may wrap or truncate)
    cout << "Char after narrowing: " << c << "\n";

    return 0;
}

/*
Example Output:
42
3
Char after narrowing: (garbage character or symbol)

Notes:
- Widening conversions are safe (no data loss).
- Narrowing conversions may lose data or overflow.
- Use static_cast to make narrowing conversions explicit and safer.
*/
