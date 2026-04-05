#include <iostream>
using namespace std;

int main() {
    int num = 42;
    int *ptr = &num;  // pointer stores the address of num

    cout << "Value of num = " << num << endl;
    cout << "Address of num (&num) = " << &num << endl;
    cout << "Pointer value (ptr) = " << ptr << endl;
    cout << "Pointer points to value (*ptr) = " << *ptr << endl;

    // Notes:
    // - * means "value at address" (dereference operator)
    // - & means "address of" (address-of operator)
    // - Pointer is a variable that holds a memory address
}
