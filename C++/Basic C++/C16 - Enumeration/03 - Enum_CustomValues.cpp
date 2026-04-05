#include <iostream>
using namespace std;

// You can assign custom integer values to enum constants
enum Level {
    LOW = 100,
    MEDIUM = 200,
    HIGH = 500,
    EXTREME           // auto continues from the previous value (501)
};

int main() {
    Level alert = HIGH;

    cout << "Alert level HIGH = " << alert << endl;
    cout << "Next auto value EXTREME = " << EXTREME << endl;

    // Comparison example
    if (alert >= MEDIUM)
        cout << "Warning: Medium or higher alert detected!" << endl;

    // Note:
    // - Custom values can start from any number
    // - The following enum members increase automatically unless redefined
}
