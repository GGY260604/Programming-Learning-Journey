#include <iostream>
using namespace std;

// Function that prints a 2D array
// When passing a 2D array, we must specify the number of columns
// The number of rows can be left flexible
void printMatrix(int matrix[][3], int rows) {
    cout << "Printing 2D array elements:" << endl;
    for (int i = 0; i < rows; i++) {
        for (int j = 0; j < 3; j++) {
            cout << matrix[i][j] << " ";
        }
        cout << endl;
    }
}

// Function that modifies a 2D array
void addOneToEach(int matrix[][3], int rows) {
    for (int i = 0; i < rows; i++) {
        for (int j = 0; j < 3; j++) {
            matrix[i][j] += 1;
        }
    }
}

int main() {
    int matrix[2][3] = {
        {1, 2, 3},
        {4, 5, 6}
    };

    cout << "Original matrix:" << endl;
    printMatrix(matrix, 2);

    // Modify the array inside a function
    addOneToEach(matrix, 2);

    cout << "Matrix after modification:" << endl;
    printMatrix(matrix, 2);

    return 0;
}

/*
Important Notes:
- 2D arrays (or higher dimension arrays) must have all dimensions except the first specified when passed to a function
  Example:
    void func(int arr[][3], int rows)
    void func(int arr[2][3])    -> also valid but less flexible
    void func(int (*arr)[3])    -> pointer form, also valid

- Arrays are passed by reference (not by copy)
  => Any changes inside the function affect the original array

- Always pass the number of rows (or any flexible dimension) as a separate argument
- Multidimensional arrays are stored in row-major order in memory
*/
