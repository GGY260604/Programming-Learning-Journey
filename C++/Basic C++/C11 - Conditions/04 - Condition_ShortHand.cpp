/*
-------------------------------------
         SHORTHAND IF (TERNARY)
-------------------------------------
C++ supports a shorthand form of if...else 
using the ternary operator (? :).
*/

#include <iostream>
using namespace std;

int main() {
    int time = 20;
    string message = (time < 18) ? "Good day." : "Good evening.";

    cout << message << endl;

    /*
    -------------------------------------
                NOTES
    -------------------------------------
    Syntax:
        variable = (condition) ? value_if_true : value_if_false;

    Example:
        int age = 17;
        string result = (age >= 18) ? "Adult" : "Minor";
    */
    return 0;
}
