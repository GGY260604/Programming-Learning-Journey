#include <iostream>
using namespace std;

int main() {
    int marks[5] = {88, 76, 92, 85, 69};

    // ------------------------------------------------------------
    // Using for loop to print all elements
    // ------------------------------------------------------------
    cout << "Printing array using for loop:" << endl;
    for (int i = 0; i < 5; i++) {
        cout << "marks[" << i << "] = " << marks[i] << endl;
    }

    // ------------------------------------------------------------
    // Using range-based for loop (C++11 and above)
    // ------------------------------------------------------------
    cout << "\nUsing range-based for loop:" << endl;
    for (int mark : marks) {
        cout << mark << " ";
    }
    cout << endl;

    return 0;
}

/*
------------------------------------------------------------
NOTES:
- Traditional for loop allows access to index positions.
- Range-based for loop simplifies reading elements only.
  Syntax: for (dataType variable : arrayName)
- Avoid modifying array size inside loops (fixed at compile time).
------------------------------------------------------------
*/
