/*
-------------------------------------
       C++ Variables - Declare
-------------------------------------
A variable is a container for storing data values.
Syntax:
    type variableName = value;
*/

#include <iostream>
using namespace std;

int main() {
    int myNum = 10;          // Integer (whole number)
    double myFloat = 3.14;   // Floating point number
    char myChar = 'A';       // Character
    string myText = "Hello"; // String (text)
    bool myBool = true;      // Boolean (true or false)

    cout << myNum << "\n";
    cout << myFloat << "\n";
    cout << myChar << "\n";
    cout << myText << "\n";
    cout << myBool << "\n";  // true prints as 1
    return 0;
}

/*
Output:
10
3.14
A
Hello
1

Note:
- Each variable has a type that defines what kind of data it can hold.
- Common types:
    int, double, char, string, bool
- Always end each statement with a semicolon (;)
*/
