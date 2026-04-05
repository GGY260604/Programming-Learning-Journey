/*
-------------------------------------
          C-STYLE STRING
-------------------------------------
A C-style string is basically an array of characters 
that ends with a special character '\0' (null terminator).

Unlike C++ string objects, the C-style string 
does not automatically resize and must be handled carefully.
*/

#include <iostream>
#include <cstring>   // Provides common string functions
using namespace std;

int main() {
    // 1. Declaration and Initialization
    char str1[6] = "Hello";   // OK, includes '\0' automatically
    char str2[] = {'W', 'o', 'r', 'l', 'd', '\0'};  // manual version

    cout << "String 1: " << str1 << endl;
    cout << "String 2: " << str2 << endl;

    /*
    --------------------------------------
       MEMORY LAYOUT AND NULL TERMINATOR
    --------------------------------------
    char str1[6] = "Hello";

    Index:   0    1    2    3    4    5
    Value:   H    e    l    l    o   '\0'

    NOTE:
    - The '\0' character marks the end of the string.
    - If '\0' is missing, functions like cout or strlen() 
      may read random memory beyond the string.
    */


    // 2. Inputting a C-style string
    char name[20];
    cout << "Enter your name (one word): ";
    cin >> name;       // reads until whitespace
    cout << "Hello, " << name << "!" << endl;

    // To read full line with spaces:
    cin.ignore();      // clear leftover newline
    cout << "Enter your full name: ";
    cin.getline(name, 20);  // reads line including spaces
    cout << "Nice to meet you, " << name << "!" << endl;


    // 3. Common C-style string functions
    char a[20] = "Hi";
    char b[20] = "There";

    // strlen() - get length
    cout << "Length of a: " << strlen(a) << endl;

    // strcpy() - copy string
    strcpy(a, b);
    cout << "After strcpy, a: " << a << endl;

    // strcat() - concatenate
    strcat(a, "!");
    cout << "After strcat, a: " << a << endl;

    // strcmp() - compare (0 means equal)
    cout << "strcmp(a, b): " << strcmp(a, b) << endl;

    /*
    --------------------------------------
             COMMON FUNCTIONS
    --------------------------------------
    strlen(s)   -> returns length (excluding '\0')
    strcpy(a,b) -> copies b into a
    strcat(a,b) -> appends b to the end of a
    strcmp(a,b) -> compares two strings
                   returns:
                   0   if equal
                   <0  if a < b
                   >0  if a > b
    */


    // 4. Manual traversal using loop
    char word[] = "C++";
    cout << "Characters in word: ";
    for (int i = 0; word[i] != '\0'; i++) {
        cout << word[i] << " ";
    }
    cout << endl;

    /*
    --------------------------------------
               IMPORTANT NOTES
    --------------------------------------
    - Always ensure your array is large enough to hold '\0'.
    - C-style strings are faster but riskier.
    - Use <string> class for safety and easier manipulation.
    */
    return 0;
}
