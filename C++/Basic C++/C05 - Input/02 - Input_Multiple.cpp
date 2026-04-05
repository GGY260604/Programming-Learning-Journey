/*
-------------------------------------
   C++ User Input - Multiple Values
-------------------------------------
You can take multiple inputs at once using a single 'cin' statement.
*/

#include <iostream>
using namespace std;

int main() {
    int a, b;

    cout << "Enter two numbers separated by space: ";
    cin >> a >> b;   // Reads both values in order

    cout << "You entered: " << a << " and " << b << "\n";
    cout << "Sum = " << a + b << "\n";
    return 0;
}

/*
Example Run:
Enter two numbers separated by space: 5 7
You entered: 5 and 7
Sum = 12

Notes:
- cin reads inputs in the same order as variables are listed.
- You must separate inputs with spaces or newlines when typing.
*/
