/*
-------------------------------------
   Functions - Overloading
-------------------------------------
You can define multiple functions with the same name
but different parameter lists (different types or counts).
The compiler resolves which one to call (overload resolution).
*/

#include <iostream>
using namespace std;

int area(int side) {               // square
    return side * side;
}

int area(int w, int h) {           // rectangle
    return w * h;
}

double area(double r) {            // circle (approx)
    const double PI = 3.141592653589793;
    return PI * r * r;
}

int main() {
    cout << "Area square(4) = " << area(4) << endl;
    cout << "Area rect(3,5) = " << area(3,5) << endl;
    cout << "Area circle(2.5) = " << area(2.5) << endl;

    // Ambiguity example (avoid)
    // area(3.0f); // float -> may convert to double or int; prefer exact types

    return 0;
}

/*
Notes:
- Return type alone cannot distinguish overloads.
- Prefer overloads that differ in parameter types/number.
- Watch out for implicit conversions that make calls ambiguous.
*/
