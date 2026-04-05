#include <iostream>
using namespace std;

int main() {
    int score[3] = {85, 90, 95};

    cout << "Accessing array elements:" << endl;
    cout << "score[0] = " << score[0] << endl;
    cout << "score[1] = " << score[1] << endl;
    cout << "score[2] = " << score[2] << endl;

    // Access by index variable
    int i = 1;
    cout << "Access using variable index (i=1): " << score[i] << endl;

    // Modify and reaccess
    score[1] = 100;
    cout << "After modification, score[1] = " << score[1] << endl;

    return 0;
}

/*
------------------------------------------------------------
NOTES:
- Elements can be accessed using arrayName[index].
- Index must be within the valid range (0 to size-1).
- Arrays are fixed-size once declared.
------------------------------------------------------------
*/
