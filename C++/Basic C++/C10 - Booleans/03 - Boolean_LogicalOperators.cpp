/*
-------------------------------------
         LOGICAL OPERATORS
-------------------------------------
Logical operators combine or modify
boolean values and conditions.
*/

#include <iostream>
using namespace std;

int main() {
    bool a = true;
    bool b = false;

    cout << boolalpha; // show true/false as words

    cout << "a && b : " << (a && b) << endl;  // AND -> true only if both are true
    cout << "a || b : " << (a || b) << endl;  // OR  -> true if at least one is true
    cout << "!a     : " << (!a) << endl;      // NOT -> inverts the value

    /*
    -------------------------------------
             EXAMPLE IN ACTION
    -------------------------------------
    Suppose we are checking if a user can log in:
    - must have password correct (true)
    - must not be locked (false)
    */

    bool passwordCorrect = true;
    bool isLocked = false;

    if (passwordCorrect && !isLocked) {
        cout << "Access granted!" << endl;
    } else {
        cout << "Access denied!" << endl;
    }

    /*
    -------------------------------------
              SUMMARY TABLE
    -------------------------------------
    Operator | Description | Example
    -------------------------------------
       &&    | AND          | (x > 5 && y < 10)
       ||    | OR           | (x == 5 || y == 7)
       !     | NOT          | !(x > 5)
    -------------------------------------
    */
    return 0;
}
