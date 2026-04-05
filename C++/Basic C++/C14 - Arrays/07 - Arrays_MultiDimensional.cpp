#include <iostream>
using namespace std;

int main() {
    // ------------------------------------------------------------
    // MULTI-DIMENSIONAL ARRAYS
    // ------------------------------------------------------------
    // Syntax:
    // dataType arrayName[row][column];
    // ------------------------------------------------------------

    int matrix[2][3] = {
        {1, 2, 3},
        {4, 5, 6}
    };

    cout << "Matrix elements:" << endl;
    for (int i = 0; i < 2; i++) {
        for (int j = 0; j < 3; j++) {
            cout << matrix[i][j] << " ";
        }
        cout << endl;
    }

    /*
    ------------------------------------------------------------
    MEMORY LAYOUT (row-major order)
    matrix[0][0] matrix[0][1] matrix[0][2]
    matrix[1][0] matrix[1][1] matrix[1][2]
    ------------------------------------------------------------
    */

    return 0;
}

/*
------------------------------------------------------------
NOTES:
- A 2D array is an array of arrays.
- Elements are stored in row-major order in memory.
- Access: array[row][col]
- Can be extended to 3D or more dimensions.
------------------------------------------------------------
*/
