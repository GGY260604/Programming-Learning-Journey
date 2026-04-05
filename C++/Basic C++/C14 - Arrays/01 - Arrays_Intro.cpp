#include <iostream>
using namespace std;

int main() {
    // ------------------------------------------------------------
    // ARRAYS INTRODUCTION
    // ------------------------------------------------------------
    // An array is a collection of elements of the same data type.
    // Each element is stored in a contiguous memory location.
    // Each element is identified by an index starting from 0.
    // Syntax:
    //      dataType arrayName[arraySize];
    // ------------------------------------------------------------

    int numbers[5]; // declare an array of 5 integers

    numbers[0] = 10;  // first element
    numbers[1] = 20;  // second element
    numbers[2] = 30;
    numbers[3] = 40;
    numbers[4] = 50;  // last element

    cout << "Array elements: ";
    cout << numbers[0] << " " << numbers[1] << " " << numbers[2]
         << " " << numbers[3] << " " << numbers[4] << endl;

    /*
    ------------------------------------------------------------
    MEMORY LAYOUT (each cell stores one element)
    Index:    0    1    2    3    4
    Value:   10   20   30   40   50
    ------------------------------------------------------------
    */

    return 0;
}

/*
NOTES:
- Array indexes in C++ always start from 0.
- The last valid index = size - 1.
- Accessing beyond the last index (out-of-bounds) causes undefined behavior.
*/
