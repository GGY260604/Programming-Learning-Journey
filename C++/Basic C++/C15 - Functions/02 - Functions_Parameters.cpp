/*
-------------------------------------
      Functions - Parameters
-------------------------------------
Functions can accept parameters (inputs).
Parameters are local variables inside the function.

Types:
- Pass by value  -> copies the value (default)
- Pass by reference -> see later example
*/

#include <iostream>
using namespace std;

void printSum(int, int);    // parameter in prototype can omit variable name

void printSum(int a, int b) {   // parameters a and b are local copies
    cout << "Sum = " << (a + b) << endl;
}

int main() {
    int x = 5, y = 7;
    printSum(x, y); // pass by value

    // Changing x after call doesn't affect the function call that already happened
    x = 100;
    printSum(x, y);

    return 0;
}

/*
Notes:
- Parameter types must match (or be implicitly convertible).
- The function receives copies when using pass-by-value.
*/
