/*
-------------------------------------
      Functions - Return Values
-------------------------------------
Functions can return values using 'return'.
The returned value can be stored in a variable.
*/

#include <iostream>
using namespace std;

int multiply(int a, int b) {
    return a * b;   // returns product to the caller
}

int main() {
    int result = multiply(6, 7);
    cout << "6 * 7 = " << result << endl;

    // Returning early
    auto safeDivide = [](int n, int d) -> double {
        if (d == 0) return 0.0;  // guard against division by zero
        return static_cast<double>(n) / d;
    };

    cout << "safeDivide(10, 2) = " << safeDivide(10,2) << endl;
    cout << "safeDivide(10, 0) = " << safeDivide(10,0) << endl;

    return 0;
}

/*
Notes:
- Return type must match the type of returned expression.
- For non-void functions, ensure all paths return a value.
- Use 'auto' with lambdas and trailing return type when needed.
*/
