/*
-------------------------------------
       C++ Strings - Concatenation
-------------------------------------
You can join (concatenate) strings using + or append().
*/

#include <iostream>
#include <string>
using namespace std;

int main() {
    string firstName = "John";
    string lastName = "Doe";

    string fullName = firstName + " " + lastName;
    cout << "Full Name (using +): " << fullName << "\n";

    string welcome = "Hello ";
    welcome.append(firstName);
    cout << "Greeting (using append): " << welcome << "\n";
}

/*
Output:
Full Name (using +): John Doe
Greeting (using append): Hello John

Notes:
- '+' joins two or more strings.
- append() adds text at the end of the existing string.
-------------------------------------
*/
