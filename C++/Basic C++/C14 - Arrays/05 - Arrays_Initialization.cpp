#include <iostream>
using namespace std;

int main() {
    // Different ways to initialize arrays
    int a[5] = {1, 2, 3, 4, 5};
    int b[] = {10, 20, 30};     // compiler counts elements (size = 3)
    int c[5] = {100, 200};      // remaining elements = 0 by default
    int d[5] = {};              // all elements initialized to 0

    cout << "a[2] = " << a[2] << endl;
    cout << "b size = 3 (auto-detected)" << endl;
    cout << "c[2] = " << c[2] << " (default 0 if not initialized)" << endl;
    cout << "d[4] = " << d[4] << " (all zeros)" << endl;

    return 0;
}

/*
------------------------------------------------------------
NOTES:
- You can omit size if initializer is provided.
- Uninitialized elements are set to 0 automatically
  when at least one value is specified in braces.
------------------------------------------------------------
*/
