/*
-------------------------------------
            IF...ELSE STATEMENT
-------------------------------------
Use if...else when you need to choose 
between two different actions.
*/

#include <iostream>
using namespace std;

int main() {
    int temperature = 30;

    if (temperature > 25) {
        cout << "It's a hot day." << endl;
    } else {
        cout << "It's a cool day." << endl;
    }

    /*
    -------------------------------------
                NOTES
    -------------------------------------
    Syntax:
        if (condition) {
            // runs if true
        } else {
            // runs if false
        }
    */
    return 0;
}
