/*
-------------------------------------
        COMBINED MULTIPLE CASES
-------------------------------------
You can group multiple cases that share the same output.
*/

#include <iostream>
using namespace std;

int main() {
    int day = 6;

    switch (day) {
        case 1:
        case 2:
        case 3:
        case 4:
        case 5:
            cout << "Weekday" << endl;
            break;
        case 6:
        case 7:
            cout << "Weekend" << endl;
            break;
        default:
            cout << "Invalid day" << endl;
    }

    /*
    -------------------------------------
                NOTES
    -------------------------------------
    - When multiple cases share the same code,
      list them together before a single statement.
    - This avoids repetition and improves clarity.
    */
    return 0;
}
