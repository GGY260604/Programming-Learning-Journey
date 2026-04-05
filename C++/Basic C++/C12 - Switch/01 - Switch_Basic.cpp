/*
-------------------------------------
              SWITCH STATEMENT
-------------------------------------
The switch statement selects one block of code 
to run based on the value of a variable.

It’s often used instead of multiple if...else if statements.
*/

#include <iostream>
using namespace std;

int main() {
    int day = 3;

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
        case 4:
            cout << "Thursday" << endl;
            break;
        case 5:
            cout << "Friday" << endl;
            break;
        case 6:
            cout << "Saturday" << endl;
            break;
        case 7:
            cout << "Sunday" << endl;
            break;
    }

    /*
    -------------------------------------
                NOTES
    -------------------------------------
    - The switch expression must be an integer, char, or enum.
    - Each case value must be unique.
    - Without 'break', execution will continue to the next case.
    */
    return 0;
}
