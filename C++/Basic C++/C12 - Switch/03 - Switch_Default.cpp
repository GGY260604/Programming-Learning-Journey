/*
-------------------------------------
             DEFAULT CASE
-------------------------------------
The 'default' case runs if no case matches.
It’s like the 'else' part of an if statement.
*/

#include <iostream>
using namespace std;

int main() {
    int day = 10;

    switch (day) {
        case 1:
            cout << "Monday" << endl;
            break;
        case 2:
            cout << "Tuesday" << endl;
            break;
        case 3:
            cout << "Wednesday" << endl;
            break;
        default:
            cout << "Invalid day number!" << endl;
    }

    /*
    -------------------------------------
                NOTES
    -------------------------------------
    - 'default' is optional but recommended.
    - It can appear anywhere inside the switch,
      but it usually comes last for clarity.
    */
    return 0;
}
