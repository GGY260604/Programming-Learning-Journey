#include <iostream>
using namespace std;

int main() {
    int numbers[5] = {10, 20, 30, 40, 50};
    int *ptr = numbers; // array name is already a pointer to first element

    cout << "Access array elements using pointer arithmetic:" << endl;

    for (int i = 0; i < 5; i++) {
        cout << "*(ptr + " << i << ") = " << *(ptr + i) << endl;
    }

    cout << "\n\nAccess using pointer subscript notation: " << endl;
    
    for (int i = 0; i < 5; i++) {
        cout << ptr[i] << " ";  // same as *(ptr + i)
    }

    cout << endl;

    // Modify an element using pointer
    *(ptr + 2) = 99;
    cout << "numbers[2] (after modification) = " << numbers[2] << endl;

    // Notes:
    // - array name = address of first element (&numbers[0])
    // - *(ptr + i) is same as numbers[i]
    // - pointer arithmetic depends on data type (increments by sizeof(type))
}
