/*
-------------------------------------
    C++ Strings - Access & Modify
-------------------------------------
Access characters using index [ ].
Modify them directly.
*/

#include <iostream>
#include <string>
using namespace std;

int main() {
    string name = "Alice";

    cout << "Original: " << name << "\n";
    cout << "First letter: " << name[0] << "\n";
    cout << "Last letter: " << name[name.length() - 1] << "\n";

    // Modify characters
    name[0] = 'M';
    cout << "Modified: " << name << "\n";
}

/*
Output:
Original: Alice
First letter: A
Last letter: e
Modified: Mlice

Notes:
- String indexing starts at 0.
- You can read or change characters using [ ].
-------------------------------------
*/
