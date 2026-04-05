/*
-------------------------------------
         C++ Strings - Input
-------------------------------------
Use cin for single-word input.
Use getline() for full-line input (with spaces).
*/

#include <iostream>
#include <string>
using namespace std;

int main() {
    string firstName;
    cout << "Enter your first name: ";
    cin >> firstName;  // stops at space
    cout << "Hello " << firstName << "!\n";

    // Clear input buffer before using getline
    cin.ignore();

    string fullName;
    cout << "Enter your full name: ";
    getline(cin, fullName);  // reads full line including spaces
    cout << "Your full name is: " << fullName << "\n";
}

/*
Example Output:
Enter your first name: John
Hello John!
Enter your full name: John Michael Doe
Your full name is: John Michael Doe

Notes:
- 'cin' stops reading when it meets a space.
- 'getline()' reads the entire line (useful for names, sentences, etc.).
- Always call cin.ignore() before getline() if using both together.
-------------------------------------
*/
