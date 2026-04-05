/*
-------------------------------------
               IF STATEMENT
-------------------------------------
The if statement executes a block of code 
only if the condition is true.
*/

#include <iostream>
using namespace std;

int main() {
    int age = 20;

    if (age >= 18) {
        cout << "You are an adult." << endl;
    }

    /*
    -------------------------------------
                NOTES
    -------------------------------------
    Syntax:
        if (condition) {
            // code runs if condition is true
        }

    The condition must be a boolean expression.
    If it evaluates to true, the block executes.
    */
    return 0;
}
