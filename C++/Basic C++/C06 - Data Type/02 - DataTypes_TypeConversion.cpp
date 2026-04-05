/*
-------------------------------------
  C++ Data Types - Type Conversion
-------------------------------------
C++ can convert data types in two ways:
1. Implicit conversion (automatic)
2. Explicit conversion (manual)
*/

#include <iostream>
using namespace std;

int main() {
    // 1. Implicit Conversion (Automatic)
    int myInt = 9;
    double myDouble = myInt;   // int automatically converted to double
    cout << myDouble << "\n";  // Output: 9

    // 2. Explicit Conversion (Manual Casting)
    double price = 9.99;
    int priceInt = (int)price;              // C-style cast
    int priceInt2 = static_cast<int>(price); // safer C++ style
    cout << priceInt << "\n";               // Output: 9
    cout << priceInt2 << "\n";              // Output: 9

    return 0;
}

/*
Output:
9
9
9

Notes:
- Implicit conversion happens automatically when types are compatible.
- Explicit conversion is done manually using (type) or static_cast<type>().
- Casting from double to int removes (truncates) the decimal part.
*/
