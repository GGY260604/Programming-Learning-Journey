#include <iostream>
using namespace std;

// Function that accepts an array as a parameter
// Here we must specify the array element type and optionally the size
void printArray(int arr[], int size) {
    cout << "Printing array elements:" << endl;
    for (int i = 0; i < size; i++) {
        cout << arr[i] << " ";
    }
    cout << endl;
}

// Function that modifies array elements
// This demonstrates that arrays are passed by reference automatically
void multiplyByTwo(int arr[], int size) {
    for (int i = 0; i < size; i++) {
        arr[i] = arr[i] * 2;
    }
}

int main() {
    int numbers[] = {2, 4, 6, 8, 10};
    int length = sizeof(numbers) / sizeof(numbers[0]);

    cout << "Original array values:" << endl;
    printArray(numbers, length);

    // Modify the array inside the function
    multiplyByTwo(numbers, length);

    cout << "Array after function multiplyByTwo:" << endl;
    printArray(numbers, length);

    return 0;
}

/*
Important Notes:
- Arrays are passed to functions as references (not copies)
  => Any modification inside the function affects the original array
- Inside the function, the array parameter is treated as a pointer to its first element
- You cannot use sizeof(arr) inside the function to get the array length,
  because arr becomes a pointer and sizeof(arr) returns the size of that pointer (usually 4 or 8 bytes)
- You must pass the array size as a separate argument
- Function parameter declaration examples:
    void func(int arr[])        -> same as void func(int* arr)
    void func(int arr[5])       -> still treated as pointer
    void func(int* arr)         -> most common and clear form
*/
