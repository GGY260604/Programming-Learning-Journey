/*
-------------------------------------
        C++ User Input - cin
-------------------------------------
The 'cin' object (short for "character input") is used to get input from the user.
The >> operator is called the extraction operator.
*/

#include <iostream>
using namespace std;

int main() {
    int age;

    cout << "Enter your age: ";
    cin >> age;   // Get input from the user and store it in 'age'

    cout << "You are " << age << " years old.\n";
    return 0;
}

/*
Example Run:
Enter your age: 20
You are 20 years old.

Notes:
- cin reads data until it encounters a space, newline, or tab.
- Always use the correct variable type (int for whole numbers, double for decimals, etc.).
- You can prompt the user using cout before cin to make interaction clear.
*/
