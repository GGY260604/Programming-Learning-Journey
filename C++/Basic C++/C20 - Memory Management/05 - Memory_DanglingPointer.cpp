// Topic: Dangling Pointer Example
// Dangling pointer means pointer still points to freed memory

#include <iostream>
using namespace std;

int main() {
    int* ptr = new int(50);
    cout << "Before delete: " << *ptr << endl;

    delete ptr;  // memory is freed

    // cout << *ptr; // dangerous -> undefined behavior

    ptr = nullptr; // good practice
    if (ptr == nullptr)
        cout << "Pointer safely set to nullptr after delete." << endl;

    return 0;
}
