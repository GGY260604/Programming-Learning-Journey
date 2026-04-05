/*
-------------------------------------
   C++ Variables - Multiple Variables
-------------------------------------
You can declare multiple variables of the same type in one line.
*/

#include <iostream>
using namespace std;

int main() {
    int x = 5, y = 10, z = 15;   // Declare and initialize multiple variables
    cout << x + y + z << "\n";

    int a, b, c;     // Declare first
    a = b = c = 50;  // Assign same value to all
    cout << a + b + c << "\n";
    return 0;
}

/*
Output:
30
150

Note:
- You can separate variables using commas.
- You can assign all of them one by one or together.
*/
