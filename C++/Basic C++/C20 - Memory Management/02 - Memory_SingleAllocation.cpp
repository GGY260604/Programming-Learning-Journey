// Topic: Dynamic Memory Allocation - Single Variable
// Use new to allocate memory dynamically
// Always delete after use to prevent memory leak

#include <iostream>
using namespace std;

int main() {
    int* number = new int; // allocate integer
    *number = 42;          // assign value

    cout << "Value stored: " << *number << endl;

    delete number;         // free memory
    number = nullptr;      // avoid dangling pointer

    return 0;
}
