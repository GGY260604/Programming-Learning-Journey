#include <iostream>
#include <string>
using namespace std;

// User-defined exception class
class DivideByZeroException {
private:
    string message;

public:
    DivideByZeroException(string msg) { message = msg; }
    string getMessage() const { return message; }
};

double divide(double a, double b) {
    if (b == 0)
        throw DivideByZeroException("Cannot divide by zero!");
    return a / b;
}

int main() {
    double x, y;

    cout << "Enter numerator: ";
    cin >> x;
    cout << "Enter denominator: ";
    cin >> y;

    try {
        double result = divide(x, y);
        cout << "Result = " << result << endl;
    }
    catch (const DivideByZeroException &ex) {
        cout << "Error: " << ex.getMessage() << endl;
    }

    cout << "Program finished normally" << endl;
    return 0;
}

/*
Important Notes:
- You can define your own exception class for specific errors
- Always catch custom exceptions by const reference for efficiency
- Encapsulation principle: private data accessed via getter
- Professional practice: use exception classes for structured error reporting
*/
