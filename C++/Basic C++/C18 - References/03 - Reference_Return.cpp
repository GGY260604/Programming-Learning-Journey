#include <iostream>
using namespace std;

// Function returning reference to a variable
int& getStaticCounter() {
    static int counter = 0;  // static => persists between calls
    return counter;          // return reference (safe because static)
}

int main() {
    int &refCounter = getStaticCounter();

    cout << "Initial counter = " << refCounter << endl;
    refCounter++;  // modifies the same variable inside the function
    cout << "After increment = " << getStaticCounter() << endl;

    // Notes:
    // - Function can safely return a reference to static or global variables
    // - Never return a reference to a local variable (it will be destroyed)
}
