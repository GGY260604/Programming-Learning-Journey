/*
-------------------------------------
    Functions - Inline Functions
-------------------------------------
'inline' suggests the compiler replace the call with function body.
Useful for very small functions to reduce call overhead.
Compilers may ignore 'inline' if they want.
*/

#include <iostream>
using namespace std;

inline int square(int x) { return x * x; }

int main() {
    cout << "square(5) = " << square(5) << endl;
    return 0;
}

/*
Notes:
- Inline is only a hint; the compiler decides.
- Define inline functions in headers or before use to avoid ODR issues.
*/
