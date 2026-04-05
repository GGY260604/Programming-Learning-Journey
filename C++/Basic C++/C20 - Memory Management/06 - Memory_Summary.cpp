// Topic: Memory Summary
// Summary of dynamic memory operators

#include <iostream>
using namespace std;

int main() {
    int* p = new int(10);         // allocate one integer
    int* arr = new int[5];        // allocate array of 5 integers

    cout << "Single value: " << *p << endl;

    for (int i = 0; i < 5; i++)
        arr[i] = i + 1;

    cout << "Array values: ";
    for (int i = 0; i < 5; i++)
        cout << arr[i] << " ";
    cout << endl;

    delete p;       // free single memory
    delete[] arr;   // free array memory

    p = nullptr;
    arr = nullptr;

    cout << "Memory freed successfully." << endl;
    return 0;
}
