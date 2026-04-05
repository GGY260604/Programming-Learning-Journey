/*
-------------------------------------
            NESTED IF
-------------------------------------
An if statement inside another if statement.
*/

#include <iostream>
using namespace std;

int main() {
    int x = 10;
    int y = 20;

    if (x > 5) {
        if (y > 15) {
            cout << "Both x and y are large." << endl;
        } else {
            cout << "x is large but y is small." << endl;
        }
    } else {
        cout << "x is small." << endl;
    }

    /*
    -------------------------------------
                NOTES
    -------------------------------------
    - Nested if is useful when decisions 
      depend on multiple related conditions.
    - Be careful with indentation for readability.
    */
    return 0;
}
