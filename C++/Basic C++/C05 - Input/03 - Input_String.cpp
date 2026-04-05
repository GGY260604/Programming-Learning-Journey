/*
-------------------------------------
    C++ User Input - Strings
-------------------------------------
The 'cin' object can read strings, but it stops at spaces.
Use 'getline()' to read full lines of text (including spaces).
*/

#include <iostream>
#include <string>
using namespace std;

int main() {
    string name;
    string fullName;

    cout << "Enter your first name: ";
    cin >> name;   // Reads only one word (stops at space)
    cout << "Hello, " << name << "!\n";

    // Use getline() to read a full line
    cout << "Enter your full name: ";
    cin.ignore();           // Clear leftover newline from previous input
    getline(cin, fullName); // Reads full line including spaces

    cout << "Welcome, " << fullName << "!\n";
    return 0;
}

/*
Example Run:
Enter your first name: Alex
Hello, Alex!
Enter your full name: Alex Tan Wei
Welcome, Alex Tan Wei!

Notes:
- cin stops at the first space, so it cannot read multi-word input directly.
- getline(cin, variable) reads the entire line including spaces.
- Use cin.ignore() before getline() to remove leftover newline characters.
*/
