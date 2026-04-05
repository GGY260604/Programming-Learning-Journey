#include <iostream>
using namespace std;

// Use a pointer to store another pointer

int main() {
    int value = 100;
    int *ptr = &value;
    int **ptr2 = &ptr;  // pointer to pointer

    cout << "value = " << value << endl;
    cout << "*ptr = " << *ptr << endl;
    cout << "**ptr2 = " << **ptr2 << endl;

    // Modify value through double pointer
    **ptr2 = 500;

    cout << "\nAfter modification through **ptr2:" << endl;
    cout << "value = " << value << endl;

    // Notes:
    // - *ptr = value
    // - **ptr2 = value (via two levels of indirection)
    // - Useful for dynamic data structures and function arguments (like double pointers)
}
