/*
-------------------------------------
  Functions - Pass By Reference
-------------------------------------
Pass by reference allows functions to modify the caller's variables
and avoids copying large objects.

Use 'Type&' for non-const reference, 'const Type&' to avoid copy but prevent modification.
*/

#include <iostream>
using namespace std;

void swapByRef(int &a, int &b) {
    int tmp = a;
    a = b;
    b = tmp;
}

void appendExclamation(string &s) {
    s += "!";
}

int main() {
    int x = 5, y = 10;
    cout << "Before swap: x=" << x << " y=" << y << endl;
    swapByRef(x, y);
    cout << "After swap: x=" << x << " y=" << y << endl;

    string msg = "Hello";
    appendExclamation(msg);
    cout << "Message: " << msg << endl;

    return 0;
}

/*
Notes:
- Pass by reference avoids a copy and gives direct access.
- Use 'const T&' for read-only parameters to avoid copying large objects.
*/
