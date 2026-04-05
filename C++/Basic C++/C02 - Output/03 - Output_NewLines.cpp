/*
-------------------------------------
      C++ Output - New Lines
-------------------------------------
You can use '\n' or endl to create a new line.
*/

#include <iostream>
using namespace std;

int main() {
    cout << "Line 1\n";           // '\n' creates a new line
    cout << "Line 2" << endl;     // endl also creates a new line
    cout << "Line 3";
    return 0;
}

/*
Output:
Line 1
Line 2
Line 3

Note:
- '\n' is faster, often preferred in loops or performance-critical code.
- endl flushes the output buffer, useful when debugging.
*/
