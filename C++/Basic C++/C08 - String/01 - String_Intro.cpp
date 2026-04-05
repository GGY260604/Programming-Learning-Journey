/*
-------------------------------------
             C++ STRING
-------------------------------------
C++ supports two main ways to handle text:
1. C-style strings (using character arrays)
2. C++ string class (from <string> library)

Let’s see both.
*/

#include <iostream>
#include <string>
using namespace std;

int main() {
    // 1. C-style string
    char greeting[] = "Hello";

    cout << "C-style string: " << greeting << endl;

    // Accessing individual characters
    cout << "First character: " << greeting[0] << endl;
    cout << "Second character: " << greeting[1] << endl;

    // Printing character codes
    cout << "Character codes in memory: ";
    for (int i = 0; i < 6; i++) {  // including the null terminator
        cout << (int)greeting[i] << " ";
    }
    cout << endl;

    /*
    -------------------------------
           INDEX STRUCTURE
    -------------------------------
    For C-style strings:
        Each character is stored in a char array.
        The last element stores '\0' (null terminator)
        which marks the end of the string.

        Example: char greeting[] = "Hello";
        Memory layout:
        ---------------------------------
        Index:   0   1   2   3   4   5
        Value:   H   e   l   l   o   \0
        ---------------------------------

        The null terminator '\0' is not visible when printed,
        but it's always there to mark the string’s end.
    */

    // 2. C++ string type
    string message = "World";

    cout << "C++ string: " << message << endl;
    cout << "First character: " << message[0] << endl;
    cout << "Length: " << message.length() << endl;

    /*
    -------------------------------
           C++ STRING CLASS
    -------------------------------
    - Provided by <string> library.
    - Easier to use, automatically handles '\0'.
    - Provides many built-in functions like:
        .length(), .append(), .substr(), .find(), etc.

    Indexing rule:
    - First character index is 0.
    - Last character index is length - 1.
    */
    return 0;
}
