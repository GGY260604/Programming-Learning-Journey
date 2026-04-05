/*
-------------------------------------
          MIN AND MAX FUNCTION
-------------------------------------
C++ provides built-in functions to get
the smaller or larger of two values.
*/

#include <iostream>
#include <algorithm>  // for min() and max()
using namespace std;

int main() {
    int x = 15;
    int y = 25;

    cout << "min(x, y) = " << min(x, y) << endl;
    cout << "max(x, y) = " << max(x, y) << endl;

    // You can also use min/max for floating-point numbers
    double a = 2.5, b = 5.9;
    cout << "min(a, b) = " << min(a, b) << endl;
    cout << "max(a, b) = " << max(a, b) << endl;

    return 0;
}
