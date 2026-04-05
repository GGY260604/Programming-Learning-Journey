/*
-------------------------------------
        C++ Strings - Length
-------------------------------------
Use length() or size() to get the number of characters.
*/

#include <iostream>
#include <string>
using namespace std;

int main() {
    string text = "Hello World";
    cout << "Text: " << text << "\n";
    cout << "Length (using length()): " << text.length() << "\n";
    cout << "Length (using size()): " << text.size() << "\n";
}

/*
Output:
Text: Hello World
Length (using length()): 11
Length (using size()): 11

Notes:
- Both length() and size() return the same result.
- Spaces count as characters too.
-------------------------------------
*/
