#include <iostream>
using namespace std;

int main() {
    int value = 50;

    // A const reference means the variable cannot be modified through the reference
    const int &ref = value;

    cout << "Value = " << value << endl;
    cout << "Ref (const reference) = " << ref << endl;

    // ref = 100; // ❌ ERROR: Cannot modify a const reference target

    // However, if the original variable changes, the const reference reflects it
    value = 80;
    cout << "After changing value directly = " << ref << endl;

    // Notes:
    // - const reference means "read-only view" of the variable
    // - It prevents accidental modification of the data through the reference
    // - But still stays connected to the original variable
}
