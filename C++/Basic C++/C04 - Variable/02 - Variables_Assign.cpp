/*
-------------------------------------
     C++ Variables - Assign Value
-------------------------------------
You can assign a value when declaring or later in the program.
*/

#include <iostream>
using namespace std;

int main() {
    int score;        // Declare first
    score = 95;       // Assign later
    cout << "Score: " << score << "\n";

    score = 100;      // Reassign (change value)
    cout << "Updated Score: " << score << "\n";
    return 0;
}

/*
Output:
Score: 95
Updated Score: 100

Note:
- Variables can be updated anytime in the program.
- The latest assigned value replaces the old one.
*/
