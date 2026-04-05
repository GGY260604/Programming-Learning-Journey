#include <iostream>
using namespace std;

int main() {
    int arr[5] = {5, 10, 15, 20, 25};

    cout << "Size of array in bytes: " << sizeof(arr) << endl;
    cout << "Size of one element: " << sizeof(arr[0]) << endl;
    cout << "Number of elements: " << sizeof(arr) / sizeof(arr[0]) << endl;

    // Iterate safely using array size
    int n = sizeof(arr) / sizeof(arr[0]);
    for (int i = 0; i < n; i++) {
        cout << "arr[" << i << "] = " << arr[i] << endl;
    }

    return 0;
}

/*
------------------------------------------------------------
NOTES:
- sizeof(array) gives total bytes used by array.
- sizeof(array[0]) gives bytes per element.
- Divide total size by element size to get number of elements.
------------------------------------------------------------
*/
