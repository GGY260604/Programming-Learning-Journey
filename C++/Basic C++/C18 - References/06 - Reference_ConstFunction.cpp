#include <iostream>
#include <string>
using namespace std;

// Using const reference in functions improves efficiency and safety
void printMessage(const string &msg) {
    // msg cannot be modified inside this function
    cout << "Message: " << msg << endl;
}

int main() {
    string greeting = "Hello, Galen!";
    printMessage(greeting);

    // You can also pass string literals or temporaries
    printMessage("Welcome to C++ learning!");

    // Notes:
    // - Passing large objects by const reference avoids copying
    // - It protects the data from accidental modification inside the function
    // - Commonly used in professional C++ code
}
