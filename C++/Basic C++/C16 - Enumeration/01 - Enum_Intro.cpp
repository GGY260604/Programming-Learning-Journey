#include <iostream>
using namespace std;

// Enum (short for "enumeration") is a user-defined type
// that consists of named integer constants for better readability.

enum Color { RED, GREEN, BLUE };

int main() {
    Color myColor = BLUE;

    cout << "The value of BLUE is: " << myColor << endl;

    // Note:
    // - By default, enum values start at 0
    //   (RED = 0, GREEN = 1, BLUE = 2)
    // - Enums make code more readable compared to using raw numbers
}
