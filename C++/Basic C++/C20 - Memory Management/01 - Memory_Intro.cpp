// Topic: Memory Management - Introduction
// Memory management allows creating and freeing memory during program execution
// There are two main areas:
// - Stack (automatic memory)
// - Heap (dynamic memory created using new keyword)

#include <iostream>
using namespace std;

int main() {
    // Automatic (stack) memory
    int x = 10; // created automatically and destroyed when function ends

    // Dynamic (heap) memory
    int* ptr = new int;  // allocate memory on heap
    *ptr = 20;

    cout << "Stack variable x: " << x << endl;
    cout << "Heap variable *ptr: " << *ptr << endl;

    delete ptr; // free memory
    ptr = nullptr; // avoid dangling pointer

    return 0;
}
