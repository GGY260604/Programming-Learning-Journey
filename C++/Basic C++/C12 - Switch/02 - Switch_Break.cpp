/*
-------------------------------------
              BREAK STATEMENT
-------------------------------------
The 'break' keyword stops the switch statement 
from running into the next case.
*/

#include <iostream>
using namespace std;

int main() {
    int day = 2;

    switch (day) {
        case 1:
            cout << "Monday" << endl;
            break;
        case 2:
            cout << "Tuesday" << endl;
            // break is missing here on purpose
        case 3:
            cout << "Wednesday" << endl;
            break;
    }

    /*
    -------------------------------------
                EXPLANATION
    -------------------------------------
    Output:
        Tuesday
        Wednesday

    Why?
    - Because case 2 has no 'break', 
      so execution continues into case 3.
    */
    return 0;
}
