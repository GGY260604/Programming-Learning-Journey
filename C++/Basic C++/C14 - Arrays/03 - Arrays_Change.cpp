#include <iostream>
using namespace std;

int main() {
    int data[3] = {10, 20, 30};

    cout << "Before change: ";
    for (int i = 0; i < 3; i++)
        cout << data[i] << " ";
    cout << endl;

    // Change value of array elements
    data[0] = 100;
    data[2] = 300;

    cout << "After change: ";
    for (int i = 0; i < 3; i++)
        cout << data[i] << " ";
    cout << endl;

    return 0;
}

/*
------------------------------------------------------------
NOTES:
- You can change an array element by assigning a new value
  using its index.
- Example: data[0] = 100;
------------------------------------------------------------
*/
