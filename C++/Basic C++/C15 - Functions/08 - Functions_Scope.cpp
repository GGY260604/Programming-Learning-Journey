/*
-------------------------------------
    Functions - Scope and Lifetime
-------------------------------------
Variables declared inside a function are local to that function.
Global variables are visible to all functions (use sparingly).

This file shows local vs global and static local variables.
*/

#include <iostream>
using namespace std;

int globalVar = 100; // global variable

void showScope() {
    int localVar = 10; // local to this function
    static int callCount = 0; // retains value between calls
    callCount++;

    cout << "localVar = " << localVar << ", callCount = " << callCount << endl;
}

int main() {
    cout << "globalVar = " << globalVar << endl;
    showScope();
    showScope();
    showScope();

    // localVar is not visible here (would be compile error)
    return 0;
}

/*
Notes:
- static local variables live for program lifetime but are scoped to function.
- Global variables can lead to tight coupling; prefer passing values explicitly.
*/
