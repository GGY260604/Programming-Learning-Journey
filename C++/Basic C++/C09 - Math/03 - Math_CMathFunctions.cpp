/*
-------------------------------------
          <cmath> FUNCTIONS
-------------------------------------
The <cmath> library provides many
commonly used mathematical functions.
*/

#include <iostream>
#include <cmath>  // Required for math functions
using namespace std;

int main() {
    cout << "sqrt(16)  = " << sqrt(16) << endl;    // square root
    cout << "pow(2, 5) = " << pow(2, 5) << endl;   // 2^5 = 32
    cout << "round(2.6) = " << round(2.6) << endl; // round to nearest
    cout << "ceil(2.1)  = " << ceil(2.1) << endl;  // round up
    cout << "floor(2.9) = " << floor(2.9) << endl; // round down
    cout << "abs(-10)   = " << abs(-10) << endl;   // absolute value
    cout << "fmod(7,3)  = " << fmod(7,3) << endl;  // floating-point remainder

    /*
    -------------------------------------
             OTHER USEFUL ONES
    -------------------------------------
    sin(x)  -> sine (x in radians)
    cos(x)  -> cosine
    tan(x)  -> tangent
    log(x)  -> natural log
    log10(x)-> base-10 log
    exp(x)  -> e^x
    */
    return 0;
}
