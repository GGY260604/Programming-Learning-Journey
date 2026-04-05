/*
-------------------------------------
  Functions - Function Pointers
-------------------------------------
Function pointers let you store addresses of functions and call them.
Useful for callbacks, tables of functions, or strategy patterns.
*/

#include <iostream>
using namespace std;

int add(int a, int b) { return a + b; }
int mul(int a, int b) { return a * b; }

int main() {
    // declare a function pointer
    int (*op)(int, int);

    op = &add; // assign address of add
    cout << "add(2,3) via pointer = " << op(2,3) << endl;

    op = &mul; // assign address of mul
    cout << "mul(2,3) via pointer = " << op(2,3) << endl;

    // array of function pointers
    int (*ops[])(int, int) = { add, mul };
    cout << "ops[1](3,4) = " << ops[1](3,4) << endl;

    return 0;
}

/*
Notes:
- Function pointer syntax can be verbose; use std::function in real code if flexibility required.
*/
