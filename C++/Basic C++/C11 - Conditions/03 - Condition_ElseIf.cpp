/*
-------------------------------------
            ELSE IF LADDER
-------------------------------------
Use else if when you have more than 
two possible outcomes.
*/

#include <iostream>
using namespace std;

int main() {
    int score = 85;

    if (score >= 90) {
        cout << "Grade A" << endl;
    } else if (score >= 80) {
        cout << "Grade B" << endl;
    } else if (score >= 70) {
        cout << "Grade C" << endl;
    } else {
        cout << "Grade D" << endl;
    }

    /*
    -------------------------------------
                NOTES
    -------------------------------------
    - Conditions are checked in order.
    - The first true block executes, and the rest are skipped.
    - Only one block runs.
    */
    return 0;
}
