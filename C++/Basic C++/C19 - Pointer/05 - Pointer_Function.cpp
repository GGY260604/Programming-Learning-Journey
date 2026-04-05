#include <iostream>
using namespace std;

// Function that takes a pointer as parameter
void increment(int *p) {
    (*p)++; // modify the value at the pointer's address
}

int main() {
    int num = 7;
    cout << "Before function call: " << num << endl;

    increment(&num); // pass the address of num
    cout << "After function call: " << num << endl;

    // Notes:
    // - Pointers allow functions to modify original variables
    // - More efficient than returning values when working with large data
}
