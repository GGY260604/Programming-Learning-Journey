/*
-------------------------------------
     C++ Strings - Special Functions
-------------------------------------
Some very useful built-in string functions:
append(), insert(), substr(), find(), replace()
*/

#include <iostream>
#include <string>
using namespace std;

int main() {
    string text = "I love C++ programming!";

    cout << "Original: " << text << "\n";

    // append()
    text.append(" It's fun!");
    cout << "After append(): " << text << "\n";

    // insert()
    text.insert(7, "really ");  // insert at index 7
    cout << "After insert(): " << text << "\n";

    // substr()
    string word = text.substr(2, 4);  // start from index 2, length 4
    cout << "Substring (2,4): " << word << "\n";

    // find()
    size_t pos = text.find("C++");
    cout << "\"C++\" found at index: " << pos << "\n";

    // replace()
    text.replace(pos, 3, "Python");
    cout << "After replace(): " << text << "\n";
}

/*
Example Output:
Original: I love C++ programming!
After append(): I love C++ programming! It's fun!
After insert(): I love really C++ programming! It's fun!
Substring (2,4): love
"C++" found at index: 13
After replace(): I love really Python programming! It's fun!

Notes:
- append() adds text at the end.
- insert(pos, text) adds text at any position.
- substr(pos, len) extracts a part of a string.
- find(text) returns the first position of a substring.
- replace(pos, len, text) replaces part of a string.
-------------------------------------
*/
