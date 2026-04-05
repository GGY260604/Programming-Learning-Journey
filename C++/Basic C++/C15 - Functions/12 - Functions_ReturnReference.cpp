/*
-------------------------------------
  Functions - Returning References
-------------------------------------
Functions can return references to allow direct modification.
Be careful: do NOT return reference to a local variable (it will dangle).
Safe to return reference to static or to object with longer lifetime.
*/

#include <iostream>
using namespace std;

int& counter() {
    static int c = 0; // static local is safe to return reference to
    return c;
}

int main() {
    int &r = counter(); // r refers to static variable inside counter()
    cout << "counter = " << r << endl;
    r = 42; // modify the static variable via the reference
    cout << "counter after change = " << counter() << endl;

    // Dangerous example (do NOT do):
    // int& bad() {
    //     int temp = 5;
    //     return temp; // returns reference to local variable -> dangling
    // }

    return 0;
}

/*
Notes:
- Only return references to objects that outlive the caller (static, global, or caller-owned).
- Returning references can be used for lvalue-like behavior.
*/
