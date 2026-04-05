/*
-------------------------------------
         BOOLEAN COMPARISONS
-------------------------------------
Comparison operators return boolean results (true/false).
*/

#include <iostream>
using namespace std;

int main() {
    int a = 10, b = 5;

    cout << "a == b : " << (a == b) << endl;
    cout << "a != b : " << (a != b) << endl;
    cout << "a > b  : " << (a > b) << endl;
    cout << "a < b  : " << (a < b) << endl;
    cout << "a >= b : " << (a >= b) << endl;
    cout << "a <= b : " << (a <= b) << endl;

    cout << boolalpha; // to show true/false text
    cout << "a == b : " << (a == b) << endl;
    cout << "a != b : " << (a != b) << endl;
    cout << "a > b  : " << (a > b) << endl;
    cout << "a < b  : " << (a < b) << endl;

    /*
    -------------------------------------
                NOTES
    -------------------------------------
    ==  -> equal to
    !=  -> not equal to
    >   -> greater than
    <   -> less than
    >=  -> greater or equal
    <=  -> less or equal

    The result of each comparison is a bool value:
    true (1) or false (0)
    */
    return 0;
}
