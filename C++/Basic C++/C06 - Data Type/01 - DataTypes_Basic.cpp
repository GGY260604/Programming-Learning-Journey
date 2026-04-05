/*
-------------------------------------
       C++ Data Types - Basic
-------------------------------------
Data types define what kind of data a variable can hold.
Common C++ data types include:
- int       : whole numbers (no decimal)
- double    : floating-point numbers (decimals)
- char      : single characters
- string    : text
- bool      : true or false
*/

#include <iostream>
#include <string>
using namespace std;

int main() {
    int myNum = 10;               // Integer (whole number)
    double myFloatNum = 5.99;     // Floating point number
    char myLetter = 'D';          // Character
    string myText = "Hello";      // String (text)
    bool myBoolean = true;        // Boolean (true or false)

    cout << myNum << "\n";
    cout << myFloatNum << "\n";
    cout << myLetter << "\n";
    cout << myText << "\n";
    cout << myBoolean << "\n";    // Prints 1 for true, 0 for false

    return 0;
}

/*
Output:
10
5.99
D
Hello
1

Notes:
- Every variable in C++ must have a data type.
- The bool type prints as 1 (true) or 0 (false).
- char values use single quotes (' ').
- string values use double quotes (" ").
*/
