#include <iostream>
using namespace std;

int main() {
    int x = 10;
    int &ref = x;   // ref is a reference (alias) to x

    cout << "x = " << x << endl;
    cout << "ref = " << ref << endl;

    cout << "--- After changing ref ---" << endl;
    ref = 20;   // changing ref also changes x
    cout << "x = " << x << endl;
    cout << "ref = " << ref << endl;

    cout << "--- After changing x ---" << endl;
    x = 30;     // changing x also changes ref
    cout << "x = " << x << endl;
    cout << "ref = " << ref << endl;

    // Notes:
    // - Reference (&) is another name (alias) for an existing variable
    // - Any change through ref affects the original variable
    // - A reference must be initialized when declared (cannot be null or reassigned)
}
