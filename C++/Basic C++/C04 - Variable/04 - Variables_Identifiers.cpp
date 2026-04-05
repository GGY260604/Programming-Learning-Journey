/*
-------------------------------------
     C++ Variables - Identifiers
-------------------------------------
An identifier is the name of a variable.
There are rules for naming identifiers.
*/

#include <iostream>
using namespace std;

int main() {
    int age = 20;           // Valid
    int Age = 21;           // Valid, case-sensitive (different from age)
    int student_age = 19;   // Valid, uses underscore
    // int 2ndStudent = 18; // Invalid: cannot start with number
    // int my-age = 22;     // Invalid: cannot use special characters like '-'

    cout << age << " " << Age << " " << student_age;
    return 0;
}

/*
Output:
20 21 19

Identifier Rules:
1. Must start with a letter or underscore (_)
2. Can contain letters, digits, and underscores
3. Case-sensitive (myVar != MyVar)
4. Cannot use reserved keywords (like int, double, return)
5. No spaces or special characters (!, -, #, etc.)
*/
