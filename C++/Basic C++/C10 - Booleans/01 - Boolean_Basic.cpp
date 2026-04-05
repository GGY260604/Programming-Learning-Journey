/*
-------------------------------------
              C++ BOOLEAN
-------------------------------------
A Boolean type (bool) stores only two possible values:
true (1) or false (0).
*/

#include <iostream>
using namespace std;

int main() {
    bool isCodingFun = true;
    bool isSleepy = false;

    cout << "isCodingFun: " << isCodingFun << endl;
    cout << "isSleepy: " << isSleepy << endl;

    // Booleans can be used in conditional statements
    if (isCodingFun) {
        cout << "Coding is fun!" << endl;
    }

    /*
    -------------------------------------
                NOTES
    -------------------------------------
    - true  is internally represented as 1
    - false is represented as 0
    - Printing a bool directly shows 1 or 0
      (not true/false words)
    - You can force it to show "true" or "false" with:
        cout << boolalpha;
    */

    cout << boolalpha;  // enable text output
    cout << "isCodingFun (text): " << isCodingFun << endl;
    cout << "isSleepy (text): " << isSleepy << endl;

    cout << noboolalpha;  // disable text output - return to 1/0
    cout << "Back to numeric: " << isCodingFun << endl;
    cout << "Back to numeric: " << isSleepy << endl;

    return 0;
}
