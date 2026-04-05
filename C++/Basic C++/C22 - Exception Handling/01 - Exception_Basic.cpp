#include <iostream>
using namespace std;

int main() {
    int a, b;

    cout << "Enter two numbers: ";
    cin >> a >> b;

    try {
        // Check for divide-by-zero
        if (b == 0)
            throw "Division by zero is not allowed";  // Throwing a C-string exception

        cout << "Result: " << a / b << endl;
    }
    catch (const char* msg) {
        cout << "Error: " << msg << endl;
    }

    cout << "Program continues after exception handling..." << endl;

    return 0;
}

/*
Important Notes:
- try block contains code that may throw an exception
- throw statement generates the exception
- catch block handles it
- Exception handling keeps program running even after error occurs
*/
