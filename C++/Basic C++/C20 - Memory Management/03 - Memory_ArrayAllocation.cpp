// Topic: Dynamic Memory Allocation - Array
// You can allocate array size at runtime using new[]
// Remember to use delete[] (not delete) to free array memory

#include <iostream>
using namespace std;

int main() {
    int size;
    cout << "Enter array size: ";
    cin >> size;

    int* arr = new int[size]; // allocate array dynamically

    cout << "Enter " << size << " elements:" << endl;
    for (int i = 0; i < size; i++)
        cin >> arr[i];

    cout << "You entered: ";
    for (int i = 0; i < size; i++)
        cout << arr[i] << " ";

    cout << endl;

    delete[] arr; // free memory for array
    arr = nullptr;

    return 0;
}
